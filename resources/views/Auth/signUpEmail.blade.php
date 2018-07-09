<?php
/**
 * Created by PhpStorm.
 * User: Dmitry Andreevich
 * Date: 09.07.2018
 * Time: 11:40
 */
?>
@section('title', 'Регистрация через E-mail')

@extends('layouts.signUp')

@section('content')

    <div class="logo signUp__logo">
        <img src="images/header__logo.png" alt="">
    </div>
    <!-- /.signUp__logo -->
    <div class="signUp__head">
        <div class="signUp__box">
            <h3 class="signUp__title signUp__title_pad">
                Присоединитесь к simleknow
                <span>бесплатно.</span>
            </h3>
            <p class="signUp__subtitle signUp__subtitle_pad">
                Получите доступ к тысячам обучающих уроков от<br> творчества и бизнеса, до спорта и высшего образования.
            </p>
        </div>
        <!-- /.signUp__box -->
    </div>
    <!-- /.signUp__head -->
    <div class="signUp__content signUp__content_pad">
        <div class="signUp__box minWidth signUp__justi ">
            <div class="signUp__socBlock signUp__socBlock_din">
                <a href="index.html" class="social social_vk ">
                    <span class="fa icon-fa-vk"></span>
                </a>
                <!-- /.social -->
            </div>
            <div class="signUp__line">

            </div>
            <!-- /.signUp__line -->
            <!-- /.signUp__socBlock -->
            <div class="signUp__socBlock signUp__socBlock_din">
                <a href="index.html" class="social  social_fc">
                    <span class="fa icon-fa-fc"></span>
                </a>
                <!-- /.social -->
            </div>
            <!-- /.signUp__socBlock -->
        </div>
        <!-- /.signUp__box -->
        <form action="{{ route('register.email') }}" method="post">
            {{ csrf_field() }}
            <div class="signUp__box minWidth signUp__justi">
                <div class="signUp__inpBlock">
                    <div class="inputArea">
                        <input type="text" class="inputArea__input" name="name">
                        <label for="" class="inputArea__name">
                            Имя
                        </label>
                    </div>
                </div>
                <!-- /.signUp__inpBlock -->
                <div class="signUp__inpBlock">
                    <div class="inputArea">
                        <input type="text" class="inputArea__input" name="second_name">
                        <label for="" class="inputArea__name">
                            Фамилия
                        </label>
                    </div>
                </div>
                <!-- /.signUp__inpBlock -->
                <div class="signUp__inpBlock signUp__inpBlock_wi100">
                    <div class="inputArea">
                        <input type="email" class="inputArea__input" name="email">
                        <label for="" class="inputArea__name">
                            Email
                        </label>
                    </div>
                </div>
                <!-- /.signUp__inpBlock -->
                <div class="signUp__inpBlock signUp__inpBlock_wi100">
                    <img src="images/kapcha.png" alt="">
                </div>
                <!-- /.signUp__inpBlock -->
                <div class="signUp__inpBlock signUp__inpBlock_wi100">
                    <button class="btn signUp__btn" type="submit">
									<span class="btn__name">
										Зарегистрироваться
									</span>
                    </button>
                </div>
                <!-- /.signUp__inpBlock -->
            </div>
            <!-- /.signUp__box -->
        </form>

    </div>
    <!-- /.signUp__content -->
    <div class="signUp__footer">
        <div class="signUp__box minWidth">

            <p class="signUp__authorization signUp__authorization_pad">
                Уже с нами?
                <a href="signIn.html">Авторизуйтесь</a>
            </p>
            <!-- /.signUp__email -->
        </div>
        <!-- /.signUp__box -->
    </div>
    <!-- /.signUp__footer -->


@endsection

