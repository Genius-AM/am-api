<template>
    <div>
        <div class="wrapper">
            <div class="main">
                <h1 class="textapplication">Secure Evolutive Application</h1>
                <h2 class="securitytext">borderless security</h2>
                <button type="submit" class="bottom">TRY THE DEMO</button>
            </div>
            <div class="tobloc">
                <h3 class="solution">Solution</h3>
                <h4 class="common">Common description</h4>
                <h2 class="textsolution">SEA is a complex security framework that provides a modern approach for protecting your information assets in the most rational and effective manner ever.
                    In other words, we are combining the simplicity of usage with a comprehensive adaptable approach for security when you are really aware of what you pay for</h2>
                <button class="presentation" type="submit">PRESENTATION</button>
                <img class="photoblock" width="200" height="100" src="images/fon1.png">
            </div>
        </div>
        <div class="keyblock">
            <div class="card">
                <div class="card-body">
                    <h2 class="textkey1">Adaptive measures powered by effective control</h2>
                    <h2 class="textkey1">Full security functions coverage</h2>
                    <h2 class="textkey1">Transparent installation and updates</h2>
                    <h2 class="textkey1">Zero-care central management</h2>
                </div>
            </div>
        </div>
        <div class="providersblock">
            <div class="toptext">
                <h3>For hosting providers </h3>
            <img class="providersphoto" width="100" height="90" src="/images/navitem1.png">
                <img class="providersphoto1" width="100" height="100" src="/images/navitem2.png">
                <img class="providersphoto2" width="100" height="100" src="/images/navitem3.png">
                <img class="providersphoto3" width="100" height="100" src="/images/navitem4.png">
            </div>
            <h5 class="textimg1">Security problems solving</h5>
            <div class="modeltext">Today we don’t have to prove the actuality of the security issues...</div>
            <button class="read1" type="submit">READ MORE</button>
            <h5 class="textimg2">Central management and billing</h5>
            <h2 class="modeltext1">Our solution is capable of being integrated into the most popular customer...</h2>
            <button class="read2" type="submit">READ MORE</button>
            <h5 class="textimg3">Customer portal and billing services rapid integration</h5>
            <h2 class="modeltext2">Presentation</h2>
            <button class="read3" type="submit">READ MORE</button>
            <h5 class="textimg4">Pay-as-you use model</h5>
            <h2 class="modeltext3">Today we don’t hWe are providing a zero risk model for you excluding your costs...</h2>
            <button class="read4" type="submit">READ MORE</button>
        </div>
    </div>
</template>


<script>
export default {
}
</script>
<style>




.textapplication{
    text-align: left;
    font-style: normal;
    font-family: "Arial", Helvetica, sans-serif;
    color: white;
    padding-left:10%;
    padding-top:23%;
    padding-right:845px;
    font-weight: bold;
;
}

.securitytext{
    text-align: left;
    font-style: normal;
    font-family: "Arial", Helvetica, sans-serif;
    color:white;
    padding-left:10%;
    padding-top:2%;

;
}
.wrapper{
    background-image: url(/images/bg.png);
    width: 100%;
    height: 89vh;
}
.bottom{
    box-sizing: border-box;

    position: absolute;
    width: 214px;
    height: 48px;
    left: 198px;
    top: 711px;
    color:white;
    background: rgba(255, 255, 255, 0.13);
    border: 2px solid #FFFFFF;
    border-radius: 6px;

}
.solution{
    position: absolute;
    width: 127px;
    height: 29px;
    left: 10%;
    top: 110.7%;

    font-family: 'Gotham Pro';
    font-style: normal;
    font-weight: 700;
    font-size: 30px;
    line-height: 29px;
    color: #000000;
}
.common{
    position: absolute;
    width: 201px;
    height: 34px;
    left: 10%;
    top:120%;

    font-family: 'Gotham Pro';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 17px;

    color: #000000;
}
.textsolution{
    position: absolute;
    width: 910px;
    height: 95px;
    left: 10%;
    top: 130%;

    font-family: 'Gotham Pro';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 128.7%;
    /* or 21px */
    color: #000000;
}

.photoblock{
    position: absolute;
    width: 40%;
    height: 50%;
    left: 60%;
    top: 103.7%;
}
.presentation{
    position: absolute;
    width: 214px;
    height: 48px;
    left: 10%;
    top: 145%;
    color: white;
    background: #458DE7;
    border-radius: 6px;
    border-color: white;
}

.textkey1{
    font-size:18px;
    text-align: center;
    margin-top:50px;
}

.card{
    position: absolute;
    width: 100%;
    height: 350px;
    left: -1px;
    top: 1250px;

    background: #F3F3F3;
}

.providersblock{
    margin-top:800px;
    text-align:center;
}

.textimg1{
    position: absolute;
    width: 188px;
    height: 38px;
    left: 9%;
    top: 1850px;

    font-family: 'Gotham Pro';
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 117.2%;
    /* or 19px */
    text-align: center;

    color: #000000;
}

.textimg2{position: absolute;
    width: 186px;
    height: 38px;
    left: 33%;
    top: 1850px;

    font-family: 'Gotham Pro';
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 117.2%;
    /* or 19px */
    text-align: center;
}

.textimg3{
    position: absolute;
    width: 186px;
    height: 57px;
    left: 56%;
    top: 1850px;

    font-family: 'Gotham Pro';
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 117.2%;
    /* or 19px */
    text-align: center;

    color: #000000;
}

.textimg4{
    position: absolute;
    width: 149px;
    height: 38px;
    left: 79%;
    top: 1850px;

    font-family: 'Gotham Pro';
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 117.2%;
    /* or 19px */
    text-align: center;

    color: #000000;
}

.providersphoto{

    position: absolute;
    left: 519px;
    top: 1720px;
}
.providersphoto1{
    position: absolute;
    left: 180px;
    right: 76.4%;
    top: 1720px;
}

.providersphoto2{
    position: absolute;
    left: 857px;
    right: 39.97%;
    top: 1720px;
}

.providersphoto3{
    position: absolute;
    left: 1165px;
    right: 21.19%;
    top: 1720px;
}

.read1{
    position: absolute;
    width: 196px;
    height: 41px;
    left: 123px;
    top: 2000px;
    color:white;
    background: #458DE7;
    border-radius: 6px;
}

.read2{
    position: absolute;
    width: 196px;
    height: 41px;
    left: 468px;
    top: 2000px;
    color:white;
    background: #458DE7;
    border-radius: 6px;
}

.read3{
    position: absolute;
    width: 196px;
    height: 41px;
    left: 805px;
    top: 2000px;
    color:white;
    background: #458DE7;
    border-radius: 6px;
}

.read4{
    position: absolute;
    width: 196px;
    height: 41px;
    left: 1115px;
    top: 2000px;
    color:white;
    background: #458DE7;
    border-radius: 6px;
}
.modeltext{
    position: absolute;
    width: 241px;
    height: 93px;
    left: 103px;
    top: 1920px;

    font-family: 'Gotham Pro';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 128.7%;
    /* or 21px */
    text-align: center;

    color: #858181;

}

.modeltext1{
    position: absolute;
    width: 281px;
    height: 63px;
    left: 427px;
    top: 1920px;

    font-family: 'Gotham Pro';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 128.7%;
    /* or 21px */
    text-align: center;

    color: #858181;

}

.modeltext2{
    position: absolute;
    width: 101px;
    height: 21px;
    left: 853px;
    top: 1931px;

    font-family: 'Gotham Pro';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 128.7%;
    /* identical to box height, or 21px */

    color: #858181;
}

.modeltext3{
    position: absolute;
    width: 224px;
    height: 63px;
    left: 1100px;
    top: 1920px;

    font-family: 'Gotham Pro';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 128.7%;
    /* or 21px */
    text-align: center;

    color: #858181;

}
</style>
