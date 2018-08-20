@extends('frontend.master.master')
@section('main')
<!--main-->
<main class="container">
    <!--breadcrumb-->
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
            <a href="{{ url('') }}" title="首頁">首頁</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/about') }}" title="關於我們">關於我們</a>
        </li>
        <li class="breadcrumb-item active">執行長的話</li>
    </ol>

    <section class="container world">

        <div class="row justify-content-center m-2">
            <a href="{{ url('/about') }}" class="col-6 col-lg-3 text-center ">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-about-1.png') }}" class="img-fluid" alt="認識病主" />
                </div>
                <h2>認識病主</h2>
            </a>
            <a href="{{ url('/about/ceo') }}" class="col-6 col-lg-3 text-center ">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-about-2.png') }}" class="img-fluid" alt="執行長的話" />
                </div>
                <h2>執行長的話</h2>
            </a>
            <a href="{{ url('/about/organization') }}" class="col-6 col-lg-3 text-center ">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-about-3.png') }}" class="img-fluid" alt="組織簡介" />
                </div>
                <h2>組織簡介</h2>
            </a>
            <a href="{{ url('/about/history') }}" class="col-6 col-lg-3 text-center ">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-about-4.png') }}" class="img-fluid" alt="大事紀" />
                </div>
                <h2>大事紀</h2>
            </a>
        </div>

        <h2 class="world__title m-5">執行長的話</h2>

        <div class="item banner-lector__item mb-5 ">
            <div class="banner-lector__box d-flex flex-column justify-content-center">
                <h2 class="banner-lector__title text-left">楊玉欣</h2>
                <div class="text-right">病人自主研究中心 - 執行長</div>
            </div>
            <div class="banner-lector__img" style="background: url({{ asset('assets/images/photo/index-lector-01.png') }}) no-repeat center; background-size: cover;"></div>
        </div>

        <h2 class="world__title-r m-5">「活著，沒有一件事比感恩更重大。」</h2>

        <p class="text-center m-5">儘管罕見疾病困鎖了身體，卻拘綁不了靈魂；她為弱勢族群代言發聲，從而長出堅韌的翅膀，成為罕病天使。2012年擔任不分區立委，將友善環境、病人自主、生命教育等等具哲思高度的議題帶入立法院，要求活著的品質、死亡的尊嚴。她持續思考、實踐，並且始終相信，人間會有一個讓老、弱、病、殘也能喜樂享受的文明境界。</p>

        <h2 class="world__title-r m-5">活著 為什麼值得</h2>

        <h3>人，為什麼值得活著？</h3>
        <h3>為了牽掛、夢想以及渴望追尋的價值？</h3>
        <h3>為了發現、辯證或者給人生一個完美的答覆？</h3>
        <p class="text-center m-5">在哪夜闌人靜的時刻，我們會忽然懷疑自己為何而活？什麼時候，我們深深覺得活著真好，又在哪些時候，我們迷失惘然覺得此生不如歸去？再精采的人生終有落幕的時刻，如果有機會站在死亡的盡頭往回看，你會不會開始思考，這一生怎麼活才值得？</p>

        <h2 class="world__title-r m-5">創造生命的美好善終</h2>
        <p class="text-center m-5">如果有一天，我們的生命將到終點，面臨病不可癒、極度痛苦而沒有其他醫療選擇，或者失去意識，無法再為自己的臨終醫療做出決定時，自己與家人必然面對身、心、靈的極大痛苦。此時，我們該怎麼作？</p>
        <p class="text-center m-5">台灣通過全亞洲第一部《病人自主權利法》，為的就是解開這道難題，讓每個人的醫療自主權和善終尊嚴，得到法律保障，希望更多人提早為自己做好重症時的醫療決定，預防自己和親友、摯愛承受痛苦。 這不只是醫療與政策的改革，我更願意相信：
            這是一場以愛為出發點，以關懷生命善終為名的社會運動！
        </p>

        <h2 class="world__title-r m-5">展開「欣生活」 遇見生命典範</h2>

        <p class="text-center m-5">我期待整個社會開始談論死亡，願意去經歷一趟思考、對話與溝通的過程。</p>
        <p class="text-center m-5">透過這個網站，希望幫助你探問自己生命的意義、價值和品質，預先想像和安排臨終的醫療選擇，然後啟動溝通，讓家人伴侶瞭解你對善終的決定。 最重要的是：做出行動，完成「預立醫療照護諮商」和簽署「預立醫療決定」！</p>
        <p class="text-center m-5">這裡將帶你看見故事，無論是大人物或小人物，在自己的生命歷程與國家政策上，如何感受、如何參與，進而改變自己和國家的命運。</p>
        <p class="text-center m-5">透過這些典範，我希望帶給社會更多幸福快樂與感動的氛圍，啟動一場生命創新思考的「欣生活運動」，讓台灣成為亞洲生命教育、生死文化與法制政策的領頭羊！</p>

        <h2 class="world__title-r m-5">從此刻起 讓我們一起練習</h2>

        <p class="text-center m-5">生命裡的各種境遇，不一定讓我們等到最美的安排，但我們可以選擇積極行動，讓人生的一切試煉，長成最美的眷顧。</p>
        <p class="text-center m-5">從此刻起，我們一起練習思考死亡，活得更清明、更有感、更珍惜！</p>
        <p class="text-center m-5">主動簽署預立醫療決定，將生死攸關的抉擇交由我們每個人自己來承擔，完成「四道」人生：道謝、道歉、道愛、道別，替家人、至親、伴侶、朋友留下回憶，實現自己的善終心願。</p>
        <p class="text-center m-5">這趟人生，我們值得好好地活著，也值得為美好的善終而努力！</p>

    </section>

</main>
@endsection