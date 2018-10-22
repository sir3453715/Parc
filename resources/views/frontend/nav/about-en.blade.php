@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - About Us</title>
@endsection
@section('main')
<!--main-->
<main class="container">
<!--breadcrumb-->
<ol class="breadcrumb container">
    <li class="breadcrumb-item">
        <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
        <a href="{{ url('') }}" title="HOME">HOME</a>
    </li>               
    <li class="breadcrumb-item active">About Us</li>
</ol>

<div class="banner-single owl-carousel px-0" title="About Us" style="background: url({{ asset('assets/images/photo/banner-about.jpg') }}) no-repeat center;background-size: cover;">
    <h2 class="banner-single__title-tl">About Us</h2>
</div>

<section class="container world">


    <h2 class="world__title-r">What Patient Autonomy Is</h2>

    <p class="text-center m-5">
        The core concept of patient autonomy is that a patient has the right to make their own medical decisions. This is closely related to three human values: Respecting patient autonomy in healthcare; safeguarding patients' rights to a good death; and promoting a harmonious physician-patient relationship. Through advancements in modern medicine, we have become able to extend our lifespans with the help of various medical treatments when we are terminally ill or have lost consciousness. However, these extensions may come at the expense of quality of life and dignity. This also brings pain to family members when they need to make medical decisions for us. For these reasons, we advocate that patients should have the right to refuse treatment and to have a dignified end of life. It is our hope that society will empower patients, and respect and trust patients' autonomous wishes. We also hope that everyone will think more deeply about having dignity at the end of life, and that the concept will form a new cultural atmosphere and way of nurturing life.
    </p>

    <h2 class="world__title-r">Patient Right to Autonomy Act: an Introduction</h2>

    <p class="text-center m-5">
        Patient autonomy has been implemented in many countries in the West for a long time, and it is seen as a universal human right. After passing the Patient Right to Autonomy Act near the end of 2015, Taiwan became the leader in Asia in implementing patient autonomy. The core concept of the Act is to ensure legal protection for the patient's right to autonomous wishes and to a dignified end. Through signing an Advance Decision, everyone will be able to make medical decisions for themselves before they become terminally ill, and thus spare themselves and their loved ones from pain.
    </p>

    <h2 class="world__title-r">Patient Autonomy Research Center: About Us</h2>
    <p class="text-center m-5">Honorary Consultant to the Legislative Yuan Yang Yu-hsin realizes the importance of serving the "last leg of life's journey", and of keeping life education and good end of life care as core concepts. For these reasons, she fought for a long-term organization specifically responsible for fighting for these benefits on behalf of the people. Therefore, in 2017, the Patient Autonomy Research Center was established. Our goals are to become a bridge between the medical field and the general public, by engaging the public with a series of creative activities that get people to think about patient autonomy and then take action.</p>
    <p class="text-center m-5">Our long-term vision is to continue promoting life education and the concept of having a dignified end, now that the Patient Right to Autonomy Act has formally come into effect. These new ways of thinking about the end of life will make Taiwan a good example for other Asian societies to follow.</p>
    
    <h2 class="world__title-r">Our Mission</h2>
    <p class="text-center m-5">Our work focuses on policy research, educational training, implementation in medical facilities, and public promotion. Through planning, coordinating, communicating, and promoting with various parties, we hope to integrate and maximize the efforts of agencies from both the governmental sector and the private sector to promote the Patient Right to Autonomy Act. By doing so, the public will be encouraged to think about the value of both a dignified end and of life.</p>

    <h2 class="world__title">We welcome people from all fields to contact us and share their views.<br>You can reach us via the methods below.</h2>
    <div class="world__box">
        <p class="mb-4"><b>Patient Autonomy Research Center</b></p>
        <p><b>Email：</b><a href="#">service@parc.tw</a></p>
        <p><b>Address:</b> No.1, Sec. 4, Roosevelt Rd., Zhongzheng Dist., Taipei City 100, Taiwan (R.O.C.)</p>
        <p><b> 　　　 　 </b>Liberal Education Classroom Building  Life Education Center.</p>
    </div>


</section>

</main>
@endsection