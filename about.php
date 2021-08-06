<?php session_start(); ?>
<title>LADO | About Us</title>
<?php include 'common/connect.php' ?>
<?php include 'common/header.php' ?>

<style>
header {
    background-image: url(assets/images/other/home.png);
    background-size: cover;
    background-position: center;
    height: 70vh;

    background-attachment: fixed;
}

.hero-text-box {
    position: absolute;
    width: 1000px;
    top: 40%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

h1.bg {
    margin-top: 0;
    color: white;
    font-weight: 600;
    font-size: 60px;

}

.card {
    box-shadow: 5px 5px 5px 5px lightgray;
}

@media (max-width:767px) {
    h1.bg {
        margin-top: 0;
        color: white;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 25px;

    }
}
</style>

<body>
    <header>
        <div class="hero-text-box text-center">
            <h1 class="text-light bg">About Us</h1>
        </div>
    </header>
    <div class="container">
        <section style="padding:40px 0px;">
            <div class="row">
                <!-- <div class="col-sm-6 col-12">
                    <img src="assets/images/other/card3.jpg" class="img-fluid" style="width:100%;height:auto;" alt="">
                </div> -->
                <div class="col-sm-12 col-12">
                    <h1 style="color:#3F51B5;" class="mb-5">About us</h1>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <p style="font-size:17px;"> Local area enrichment organization has been working for the
                                prosperity of local area for the last 10 years. We believe that if we want to bring
                                prosperity in our region, then we
                                have to try
                                ourselves, no one can come from outside and do anything for us. Our community depends
                                only on
                                our efforts.
                                Keeping this in mind, taking the youth section of our region together and making them
                                aware of
                                their competitive exam, they created our institute Star Study Group to join the job in
                                government service. Have done
                                Also, with the aim of providing employment to unemployed youth and the Kisan brothers
                                should get
                                fair price of milk, our organization established Samriddhi Milk. Through this, people
                                are
                                connected with us. With Jesus, our endemic area can prosper.</p>
                        </div>
                        <div class="col-sm-6 col-12">
                            <p style="font-size:17px;"> स्थानिक क्षेत्र समृद्धी संस्था पिछले 10 वर्षो से स्थानिक क्षेत्र
                                के समृद्धी के लिये कार्य कर रही है. हमारा यह मानना है की अगर हमारे क्षेत्र में अगर
                                समृद्धी लानी है तो हमे खुद को ही प्रयास करणा होगा कोई बाहर से आकर हमारे लिये कुछ नही कर
                                सकता. हमारी समुद्धी केवल हमारे प्रयासो पर निर्भर है.
                                इसी बात को ध्यान मे रखते हुये हमारे क्षेत्र के युवा वर्ग को साथ लेते हुये उने स्पर्धा
                                परीक्षा के बारे मे जागरूक कर सरकारी सेवा मे नोकरी मिलणें के लिये हमारी संस्थाने स्टार
                                स्टडी ग्रुप का निर्माण किया जीस के माध्यम से आज कही युवा सरकारी नोकरी प्राप्त कर चुके
                                है.
                                साथ ही बेरोजगार युवा वो को रोजगार प्राप्त हो और किसाण भाईयो को दूध का उचित मूल्य प्राप्त
                                हो इस उद्देश को ध्यान मे रखते हुये हमारी संस्था ने समृद्धी मिल्क की स्थापना की. इस के
                                माध्यम से हमारे साथ शेकडो लोग जूडे हुये है. जीस से हमारा स्थानिक क्षेत्र समृद्ध हो सके.
                            </p>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <section style="padding:40px 0px;">
            <h1 style="color:#3F51B5;" class="mb-5">Our Aim</h1>
            <div class="row">

                <!-- <div class="col-sm-4 col-12 mb-5">

                    <div class="card ml-3" style="width:300px;">
                        <img class="card-img-top" src="assets/images/teams/team-1.jpg" alt="Card image"
                            style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">Ronald Richards</h4>
                            <h5 class="card-text mb-5" style="color:#3F51B5;">Designer</h5>

                        </div>
                    </div>
                </div> -->

                <div class="col-sm-6 col-12 mb-5">
                    <p style="font-size:17px;">
                        Inspire people for their choice and need education, through education, through which they can
                        solve all the problems of their life by themselves and enrich their life and finally this
                        society and the region.
                    </p>
                    <!-- <div class="card ml-3" style="width:300px">
                        <img class="card-img-top" src="assets/images/teams/team-2.jpg" alt="Card image"
                            style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">Wade Warren</h4>
                            <h5 class="card-text mb-5" style="color:#3F51B5;">Designer</h5>

                        </div>
                    </div> -->
                </div>

                <div class="col-sm-6 col-12 mb-5">
                    <p style="font-size:17px;">
                        लोगो को उनकी पसंद और आवश्यकता नुसार शिक्षा के लिये प्रेरित करना, शिक्षित करना जीस के माध्यम से
                        वह अपने जीवन की सभी समस्या का समाधान स्वयंम कर अपने जीवन को और अंत मे इस समाज को और क्षेत्र को
                        समृद्ध कर सके.
                    </p>
                    <!-- <div class="card ml-3" style="width:300px">
                        <img class="card-img-top" src="assets/images/teams/team-3.jpg" alt="Card image"
                            style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">Ralph Edwards</h4>
                            <h5 class="card-text mb-5" style="color:#3F51B5;">Designer</h5>

                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <section class="mb-5" style="padding:40px 0px;">
            <div class="row">
                <!-- <div class="col-sm-6 col-12">
                    <img src="assets/images/other/cupcake.png" class="img-fluid" style="width:350px;height:350px;"
                        alt="">
                </div> -->
                <div class="col-sm-12 col-12">
                    <h1 style="color:#3F51B5;" class="mb-5">For our partner</h1>
                    <div class="row">
                        <div class="col-sm-6">

                            <!-- <h3 style="color:#3F51B5;">Our Aim</h3> -->
                            <p style="font-size:17px;" class="mb-5">
                                We are going to give such a chance to all your partners by Lado Ecom which till date no
                                system has given you. You can get life time benefit by registering for free in Lado
                                Ecom. The benefits coming in the Lado Ecom will be shared equally with all your
                                partners. For this, you will have to buy any one of the products of Daily Need given
                                below, along with this you will become a partner of our Lado Ecom.
                                <br>
                                You have started your business or want to do it and you have to increase it further
                                For this, you need to dress up your products to more customers. Of lado ecom
                                Through this, it will be very simple and absolutely beneficial for you. Join us for more information
                                Must contact
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-size:17px;" class="mb-5">
                                लाडो इकॉम् द्वारा हम आप सभी पार्टनर को एक ऐसा मौका देने वाले है जो आज तक किसी भी सिस्टम
                                ने आपको नही दिया होगा. लाडो इकॉम मे फ्री मे रजिस्टर होकर आप पा सकते है लाईफ टाइम
                                बेनीफिट. लाडो इकॉम् मे आने वाले फायदे को आप सभी पार्टनर के साथ बराबर बाटा जायेगा. इसके
                                लिये आपको नीचे दि गये डेली नीड के प्रॉडक्ट्स मे से कोई भी एक प्रॉडक्ट खरीदना होगा इस के
                                साथ ही आप हमारे लाडो इकॉम के पार्टनर बन जायेंगे.

                                <br>
                                आप ने अपना बिजनेस स्टार्ट कर लिया है या करणा चाहते हो और आपको उसे और अधिक बढा करणा है
                                इसके लिये आपको अपने प्रॉडक्ट्स को ज्यादा ग्राहको तक पोहचाणा बहोत जरुरी है. लाडो इकॉम के
                                माध्यम से ये आपके लिये होगा बिल्कुल सरल और एकदम फायदेमंद. अधिक जाणकारी के लिये हमारे साथ
                                अवश्य संपर्क करे.
                            </p>
                        </div>

                    </div>


                </div>
            </div>
        </section>
    </div>
</body>

<?php include 'common/footer.php' ?>