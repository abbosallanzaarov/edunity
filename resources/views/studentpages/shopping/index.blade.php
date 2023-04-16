@extends('layouts.studentlayout')

@section('content')
    <span>
        @if ($message = Session::get('coin_message'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Tekshiring!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($message_success = Session::get('coin_success'))
            <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                <strong>Gap Yo'q!</strong> {{ $message_success }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </span>


    <div class="ml-3 d-flex justify-content-start flex-wrap ">

        @forelse($gifts as $gift)
            <div class=" mt-5 mx-5">
                <div class="card">
                    <!-- Верхняя часть -->
                    <div class="card__top">
                        <!-- Изображение-ссылка товара -->
                        <a href="#" class="card__image">
                            <img src="{{ asset($gift->image) }}" alt="{{ $gift->title }}" />
                        </a>
                        <!-- Скидка на товар -->
                        <div class="card__label">{{ $gift->coin }}</div>
                    </div>
                    <!-- Нижняя часть -->
                    <div class="card__bottom">
                        <!-- Цены на товар (с учетом скидки и без)-->
                        <h3 class="text-center">
                            <b>
                                {{ $gift->name }}
                            </b>
                        </h3>
                        <!-- Ссылка-название товара -->
                        <a href="#" class="card__title">
                            {{ $gift->desc }}
                        </a>
                        <!-- Кнопка добавить в корзину -->
                        <button data-toggle="modal" data-target="#exampleModal{{$gift->id}}" class="card__add">Xarid Qilish</button>

                        <div class="modal fade" id="exampleModal{{$gift->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Agar Xarid Qilsangiz Coinlaringiz
                                            Kamayadi Xaridga Rozimisiz</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kerak
                                            Emas</button>
                                        <a href="{{ route('shopping.product', $gift->id) }}" class="btn btn-primary">Harid
                                            Qilaman</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        @empty
            <h4 class="text-center">
                Studentlat Yo'q
            </h4>
        @endforelse
    </div>




    <style>
        .card {
            width: 225px;
            min-height: 350px;
            box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            /* Размещаем элементы в колонку */
            border-radius: 4px;
            transition: 0.2s;
            position: relative;
        }

        /* При наведении на карточку - меняем цвет тени */
        .card:hover {
            box-shadow: 4px 8px 16px rgba(255, 102, 51, 0.2);
        }

        .card__top {
            flex: 0 0 220px;
            /* Задаем высоту 220px, запрещаем расширение и сужение по высоте */
            position: relative;
            overflow: hidden;
            /* Скрываем, что выходит за пределы */
        }

        /* Контейнер для картинки */
        .card__image {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .card__image>img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* Встраиваем картинку в контейнер card__image */
            transition: 0.2s;
        }

        /* При наведении - увеличиваем картинку */
        .card__image:hover>img {
            transform: scale(1.1);
        }

        /* Размещаем скидку на товар относительно изображения */
        .card__label {
            padding: 4px 8px;
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: #ff6633;
            border-radius: 4px;
            font-weight: 400;
            font-size: 16px;
            color: #fff;
        }

        .card__bottom {
            display: flex;
            flex-direction: column;
            flex: 1 0 auto;
            /* Занимаем всю оставшуюся высоту карточки */
            padding: 10px;
        }

        .card__prices {
            display: flex;
            margin-bottom: 10px;
            flex: 0 0 50%;
            /* Размещаем цены равномерно в две колонки */
        }

        .card__price::after {
            content: "₽";
            margin-left: 4px;
            position: relative;
        }

        .card__price--discount {
            font-weight: 700;
            font-size: 19px;
            color: #414141;
            display: flex;
            flex-wrap: wrap-reverse;
        }

        .card__price--discount::before {
            content: "Со скидкой";
            font-weight: 400;
            font-size: 13px;
            color: #bfbfbf;
        }

        .card__price--common {
            font-weight: 400;
            font-size: 17px;
            color: #606060;
            display: flex;
            flex-wrap: wrap-reverse;
            justify-content: flex-end;
        }

        .card__price--common::before {
            content: "Обычная";
            font-weight: 400;
            font-size: 13px;
            color: #bfbfbf;
        }

        .card__title {
            display: block;
            margin-bottom: 10px;
            font-weight: 400;
            font-size: 17px;
            line-height: 150%;
            color: #414141;
        }

        .card__title:hover {
            color: #ff6633;
        }

        .card__add {
            display: block;
            width: 100%;
            font-weight: 400;
            font-size: 17px;
            color: #70c05b;
            padding: 10px;
            text-align: center;
            border: 1px solid #70c05b;
            border-radius: 4px;
            cursor: pointer;
            /* Меняем курсор при наведении */
            transition: 0.2s;
            margin-top: auto;
            /* Прижимаем кнопку к низу карточки */
        }

        .card__add:hover {
            border: 1px solid #ff6633;
            background-color: #ff6633;
            color: #fff;
        }
    </style>
@endsection
