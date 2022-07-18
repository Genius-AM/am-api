<template>
    <div class="container">
        <div class="container">
            <h2 class="company">О проекте</h2>
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-3">
                        <h3 class="infoProject">
                            Компания зарегистрирована в Августе 2022 года. За это время нами было реализованно данное средсво маниторинга компаний.
                        </h3>
                    </div>
                </div>
            </div>
            <div class="elementor-widget-container">
                <h3 class="mt-5 elementor-heading-title elementor-size-default">Почему нас выбирают</h3>
            </div>
            <div class="elementor-element elementor-element-4m0mpja elementor-widget elementor-widget-text-editor">
                <h5 class="mt-5">Высокая производительность</h5>
            </div>
            <div class="elementor-text-editor elementor-clearfix">
                <p>
                    Большой опыт в разработке,
                    <pre></pre>
                    знаение удобсва данных систем
                </p>
            </div>
        </div>
    </div>



</template>

<script>
export default {

}
</script>
<style>
.company{
    text-align: center;
    font-style: normal;
    font-weight: 1000;
    font-size: 21px;
    line-height: 2.2;
    font-family: Montserrat, sans-serif;
    color: #4c4c4d;
}
.infoProject{
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 2.2;
    font-family: Montserrat, sans-serif;
    text-align: center;
    color: #4c4c4d;
}
.elementor-size-default{
    font-style: normal;
    font-weight: 500;
    font-size: 29px;
    line-height: 2.2;
    font-family: Montserrat, sans-serif;
    text-align: center;
    color: black;
}
.elementor-clearfix::after{
    content: "";
    display: block;
    clear: both;
    width: 0;
    height: 0;
}
</style>
