@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 關於我們 - 我們的任務</title>
@endsection
@section('main')
<!--main-->
<main class="container">
    <!--breadcrumb-->
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C" tabindex="2">:::</a>
            <a href="{{ url('') }}" title="首頁" tabindex="2">首頁</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/about') }}" title="關於我們" tabindex="2">關於我們</a>
        </li>
        <li class="breadcrumb-item active">我們的任務</li>
    </ol>
    <div class="banner-single owl-carousel px-0" title="關於我們"
        style="background: url({{ asset('assets/images/photo/new-banner-about.jpg') }}) no-repeat center;background-size: cover;">
        <h2 class="banner-single__title-tl">關於我們</h2>
    </div>
    <section class="container world">

    <div class="row justify-content-center m-2">
            <a href="{{ url('/about') }}" class="col-6 col-lg-3 text-center " title="認識病主中心">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/new-icon-about-1.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>認識病主中心</h2>
            </a>
            <a href="{{ url('/about/ceo') }}" class="col-6 col-lg-3 text-center " title="執行長的話">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/new-icon-about-2.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>執行長的話</h2>
            </a>
            <a href="{{ url('/about/organization') }}" class="col-6 col-lg-3 text-center " title="我們的任務">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/new-icon-about-3.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>我們的任務</h2>
            </a>
            <a href="{{ url('/about/history') }}" class="col-6 col-lg-3 text-center " title="大事紀">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/new-icon-about-4.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>大事紀</h2>
            </a>
        </div>

<div class="row m-3 m-md-5 px-md-4">
<div class="font-weight-bold col-lg-4 text-left pr-5 mb-4" style="font-size: 20px;
line-height: 150%;border-left:solid 5px #EC7070;">
試想，當有一天不能動彈，那個幫您擦屁股及照顧您的人是誰呢？
</div>
<div class="font-weight-bold col-lg-4 text-left pr-5 mb-4" style="font-size: 20px;
line-height: 150%;border-left: solid 5px #EC7070;">
當他主張您的心願，<br>是否會遭到其他家屬的壓力呢？
</div>
<div class="font-weight-bold col-lg-4 text-left pr-5 mb-4" style="font-size: 20px;
line-height: 150%;border-left: solid 5px #EC7070;">
他知道您若遇到重大不可逆轉且極其痛苦的狀態，你的心願為何嗎？
</div>
</div>
  <div class="mx-3 mx-md-auto text-left" style="max-width:500px;">       
<div>
<h2 class="mt-5 mb-4 pt-5" style="font-weight: bold;
font-size: 30px; color:#EE7760">“一旦你生病的時候，你就更不能保護你自己的權益，這叫雙重弱勢”</h2>
<p class="mb-5">
社會上長期存在一群失去主體性的角色——病人。 人群中極少聽見病人的聲音，人行道上看不見重症病患；路上碰巧遇見身障者兜售商品時，人們經常選擇視而不見。病人因疾病成為弱勢者，從生活大小事到醫療決策常由他人代為決定。這個我們人人都可能成為的「病人」，我們希望他的聲音被聽見、權利被保障，他的親愛之人也能得到安頓。
</p>
<p>
在以往我們並無一部以病人為主體並賦權的法與制度來保障我們的權利。現今透過孫效智教授與楊玉欣執行長，以及眾多先進的努力下，病主法於2019年正式施行，以「尊重病人醫療自主」、「保障病人善終權益」、「促進醫病關係和諧」三大宗旨，在制度的層面有了最基本的保障。
</p>
</div>

<div>
<h2 class="mt-5 mb-4 pt-5" style="font-weight: bold;
font-size: 30px; color:#EE7760">但這僅是病人自主權的開端…<br>您知道嗎?</h2>
<p>
2025年，台灣將全面進入超高齡社會，同時將有近五百萬的熟齡族群產生，從老、到步入病的階段，需求量大增的情況下，總體社會無論照顧以及最終的醫療自主保障都極其迫切。
</p>
</div>
         
<div>
<h2 class="mt-5 mb-4 pt-5" style="font-weight: bold;
font-size: 30px; color:#EE7760">“將問題成為改變的契機”－病主法立法者、病主中心楊玉欣執行長</h2>
<p>
病主中心始終進行著「最困難」問題的解決：除不計成本集結各界名師免費開辦超法規兩倍以上時數的醫療人員教育訓練計畫、往最困難的病友家庭深入解決問題－努力消弭結構性排除、向大眾溝通最容易被忽視的死亡識能，到默默奔走政府單位溝通最根本的制度面解決問題──正因我們看見需求，我們傾己全力！
</p>
</div>
<div>
<h2 class="mt-5 mb-4 pt-5" style="font-weight: bold;
font-size: 30px; color:#EE7760">四大任務與使命</h2>
<p>
我們致力於政策研究、教育訓練、醫療院所施行及大眾宣導等任務，透過與各方統籌、協調、溝通與推動，希望整合政府與民間不同層級屬性之單位，協力分工發揮綜效， 普及推廣《病人自主權利法》，引領社會大眾思考尊嚴善終與生命價值。
</p>
</div>
</div> 
<div class="mt-5 pt-5">
<img src="{{ asset('assets/images/photo/new-mission-map.png') }}" class="img-fluid" alt="" />
</div>
    <div class="mb-5">
    <h2 class="text-center mt-5 pt-5" style="font-weight: bold;
font-size: 30px; color:#EE7760">病主中心2020-2031年目標</h2>
<p>以四大任務欲解決之病人迫切需求</p>
<div class="row justify-content-center">
<div class="py-1 px-4 mx-2 mb-2" style="background: #435D74;border-radius: 50px; color:white;font-size:20px;">宣傳提升</div>
<div class="py-1 px-4 mx-2 mb-2" style="background: #435D74;border-radius: 50px; color:white;font-size:20px;">配套提升</div>
<div class="py-1 px-4 mx-2 mb-2" style="background: #435D74;border-radius: 50px; color:white;font-size:20px;">醫療院所能量</div>
<div class="py-1 px-4 mx-2 mb-2" style="background: #435D74;border-radius: 50px; color:white;font-size:20px;">諮詢人員能量</div>
<div class="py-1 px-4 mx-2 mb-2" style="background: #435D74;border-radius: 50px; color:white;font-size:20px;">弱勢方案</div>
</div>
    </div>      
         
        </section>
    </main>
@endsection