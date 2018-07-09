<?php
/**
 * Created by PhpStorm.
 * User: Dmitry Andreevich
 * Date: 09.07.2018
 * Time: 11:37
 */
?>
@section('title', 'Вход')

@extends('layouts.signUp')

@section('content')
    <div class="logo signUp__logo">
        <img src="images/header__logo.png" alt="">
    </div>
    <!-- /.signUp__logo -->
    <div class="signUp__head">
        <div class="signUp__box">
            <h3 class="signUp__title signUp__title_pad">
                Авторизуйтесь
            </h3>
            <p class="signUp__subtitle signUp__subtitle_pad">
                Введите данные указанные при регистрации или <br> авторизуйтесь через соцсети
            </p>
        </div>
        <!-- /.signUp__box -->
    </div>
    <!-- /.signUp__head -->
    <div class="signUp__content signUp__content_pad">
        <div class="signUp__box minWidth signUp__justi ">
            <div class="signUp__socBlock signUp__socBlock_din">
                <a href="{{ App\Classes\VkApiHelper::getLinkAuthCode( route('login.vk') ) }}" class="social social_vk ">
                    <span class="fa icon-fa-vk"></span>
                </a>
                <!-- /.social -->
            </div>
            <div class="signUp__line">

            </div>
            <!-- /.signUp__line -->
            <!-- /.signUp__socBlock -->
            <div class="signUp__socBlock signUp__socBlock_din">
                <a href="{{ App\Classes\FbApiHelper::getLinkAuthCode( route('login.fb') ) }}" class="social  social_fc">
                    <span class="fa icon-fa-fc"></span>
                </a>
                <!-- /.social -->
            </div>
            <!-- /.signUp__socBlock -->
        </div>
        <!-- /.signUp__box -->
        <div class="signUp__box minWidth signUp__justi">

            <form action="{{ route('login.email') }}" method="post">
                {{ csrf_field() }}
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
                    <div class="inputArea">
                        <input type="text" class="inputArea__input" name="password">
                        <label for="" class="inputArea__name">
                            Пароль
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
										Войти
									</span>
                    </button>
                </div>
                <!-- /.signUp__inpBlock -->
            </form>
        </div>
        <!-- /.signUp__box -->
    </div>
    <!-- /.signUp__content -->
    <div class="signUp__footer">
        <div class="signUp__box minWidth">

            <p class="signUp__authorization signUp__authorization_pad">
                Вы ещё не с нами?
                <a href="{{ route('register.main') }}">Зарегистрироваться</a>
            </p>
            <!-- /.signUp__email -->
        </div>
        <!-- /.signUp__box -->
    </div>
    <!-- /.signUp__footer -->
@endsection