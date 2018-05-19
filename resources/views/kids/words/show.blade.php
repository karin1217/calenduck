@extends('layouts.main.frame')

@section('content')
    <style>
        .panel-frame {
            width: 23%;
            border:1px solid #F9F9F9;
            border-radius: 5px;
            margin: 5px;
            text-align: center;
            display: inline-block;
        }
        .panel-frame img {
            width: 90%;
        }
        .panel-frame .buttons .btn {
            display: inline-block;
            margin-bottom: 5px;
        }
        .words-content>.row {
            width: 100%;
            margin: 5px;
        }
    </style>
    <div class="wrapper words-content">
        @include('shared._errors')
        <h2 class="title">试音</h2>
        <div class="row">
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/1.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="啄木鸟">啄木鸟</button>
                    <button class="btn btn-warning play-sound" data-word="Woodpecker">Woodpecker</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/2.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="螃蟹">螃蟹</button>
                    <button class="btn btn-warning play-sound" data-word="crab">Crab</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/3.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="狗">狗</button>
                    <button class="btn btn-warning play-sound" data-word="dog">Dog</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/4.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="猪">猪</button>
                    <button class="btn btn-warning play-sound" data-word="pig">Pig</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/5.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="秃鹰">秃鹰</button>
                    <button class="btn btn-warning play-sound" data-word="Bald eagle">Bald eagle</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/6.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="青蛙">青蛙</button>
                    <button class="btn btn-warning play-sound" data-word="Frog">Frog</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/7.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="鸭子">鸭子</button>
                    <button class="btn btn-warning play-sound" data-word="Duck">Duck</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/8.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="吉娃娃">吉娃娃</button>
                    <button class="btn btn-warning play-sound" data-word="Ji Wawa">Ji Wawa</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/9.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="袋鼠">袋鼠</button>
                    <button class="btn btn-warning play-sound" data-word="Kangaroo">Kangaroo</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/10.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="小鸡">小鸡</button>
                    <button class="btn btn-warning play-sound" data-word="Chick">Chick</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/11.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="小马">小马</button>
                    <button class="btn btn-warning play-sound" data-word="Pony">Pony</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/12.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="乌龟">乌龟</button>
                    <button class="btn btn-warning play-sound" data-word="Tortoise">Tortoise</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/13.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="老鼠">老鼠</button>
                    <button class="btn btn-warning play-sound" data-word="Mouse">Mouse</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/16.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="章鱼">章鱼</button>
                    <button class="btn btn-warning play-sound" data-word="Octopus">Octopus</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/17.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="热带鱼">热带鱼</button>
                    <button class="btn btn-warning play-sound" data-word="Tropical fish">Tropical fish</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/18.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="小猫">小猫</button>
                    <button class="btn btn-warning play-sound" data-word="Cat">Cat</button>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/19.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="牛">牛</button>
                    <button class="btn btn-warning play-sound" data-word="Cattle">Cattle</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/20.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="松鼠">松鼠</button>
                    <button class="btn btn-warning play-sound" data-word="Squirrel">Squirrel</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/21.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="羊">羊</button>
                    <button class="btn btn-warning play-sound" data-word="Sheep">Sheep</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/22.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="鼹鼠">鼹鼠</button>
                    <button class="btn btn-warning play-sound" data-word="Mole">Mole</button>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/24.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="鲨鱼">鲨鱼</button>
                    <button class="btn btn-warning play-sound" data-word="Shark">Shark</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/25.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="虾">虾</button>
                    <button class="btn btn-warning play-sound" data-word="Shrimp">Shrimp</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/27.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="兔子">兔子</button>
                    <button class="btn btn-warning play-sound" data-word="Rabbit">Rabbit</button>
                </div>
            </div>
            <div class="panel-frame">
                <div class="row">
                    <img src="/uploads/images/png_avatars/32.png" />
                </div>
                <div class="row buttons">
                    <button class="btn btn-warning play-sound" data-word="相机">相机</button>
                    <button class="btn btn-warning play-sound" data-word="Camera">Camera</button>
                </div>
            </div>

        </div>


        <!--控制播放-->
        {{--<div id="bg_music_btn" num='1' style="background-color: black;height: 100px;width: 100px; display: none">关闭背景音乐</div>--}}

        {{--<!--背景音乐-->--}}
        {{--<div id="bg_music"></div>--}}
    </div>
@stop