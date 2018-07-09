<?php
/**
 * Created by PhpStorm.
 * User: Dmitry Andreevich
 * Date: 09.07.2018
 * Time: 11:37
 */
?>
@section('title', 'Регистрация')

@extends('layouts.signUp')

@section('content')

    <div class="logo signUp__logo">
        <img src="images/header__logo.png" alt="">
    </div>
    <!-- /.signUp__logo -->
    <div class="signUp__head">
        <div class="signUp__box">
            <h3 class="signUp__title">
                Присоединитесь к simleknow
                <span>бесплатно.</span>
            </h3>
            <p class="signUp__subtitle">
                Получите доступ к тысячам обучающих уроков от<br> творчества и бизнеса, до спорта и высшего образования.
            </p>
        </div>
        <!-- /.signUp__box -->
    </div>
    <!-- /.signUp__head -->
    <div class="signUp__content">
        <div class="signUp__box">
            <div class="signUp__socBlock">
                <a href="index.html" class="social social_vk ">
                    <span class="fa icon-fa-vk"></span>
                    <span class="text">
                                    Зарегистрироваться через ВК
                                        </span>
                </a>
                <!-- /.social -->
            </div>
            <!-- /.signUp__socBlock -->
            <div class="signUp__socBlock">
                <a href="index.html" class="social  social_fc">
                    <span class="fa icon-fa-fc"></span>
                    <span class="text">
                                            Зарегистрироваться через FB
                                        </span>
                </a>
                <!-- /.social -->
            </div>
            <!-- /.signUp__socBlock -->
        </div>
        <!-- /.signUp__box -->
    </div>
    <!-- /.signUp__content -->
    <div class="signUp__footer">
        <div class="signUp__box">
            <p class="signUp__email">
                Или зарегистрируйтесь с
                <a href="signUpEmail.html">помощью email</a>
            </p>
            <!-- /.signUp__email -->
            <p class="signUp__authorization">
                Уже с нами?
                <a href="signIn.html">Авторизуйтесь</a>
            </p>
            <!-- /.signUp__email -->
        </div>
        <!-- /.signUp__box -->
    </div>
    <!-- /.signUp__footer -->

@endsection
