<style>
    .panel
    {
        margin-bottom: 0px;
    }
    .checkout-step
    {
/*background: #e8eef1;*/

        background: #0096FF;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #0096FF, #0096FF);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #0096FF, #0096FF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


border-top: 1px solid #607d8b21;
        color: #666;
        font-size: 14px;
        padding: 15px 10px;
        position: relative;
    }

    .checkout-step-number
    {
        border-radius: 50%;
/* border: 1px solid #ced0d2; */
        display: inline-block;
        background: #961c1c;
        font-size: 12px;
        color: #fff;
        font-weight: bold;
        height: 32px;
        margin-right: 15px;
        padding: 6px;
        text-align: center;
        width: 32px;
    }
    .checkout-step-title
    {
        font-size: 16px;
        font-weight: 500;
        vertical-align: middle;display: inline-block; margin: 0px;
        color: #fff;
    }

    .checkout-step-body
    {
        background: #fbfbfb;
        padding: 15px 0px;
        margin: 20px 0px 0px;
    }

/*Shyam*/

    .imi-joingform
    {
        margin-top: 50px;
    }

    .imc-jfheader
    {
        background: #fff;
        padding: 15px;
    }

    .imc-text h1
    {
        font-size: 20px;
        color: #fff;
    }

    .imc-text h2
    {
        font-size: 12px;
    }

    .imc-jfeditbtn
    {
        padding: 5px;
        font-size: 12px;
        color: #fff;
        font-weight: bold;
        background: #961c1c;
    }

</style>
<div class="container imi-joingform">
<!-- Start Header -->
    <div class="imc-jfheader">
        <div class="row">
            <div class="col-lg-6">
                <div class="imc-logo">
                    <h3>Company History</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

<!-- Start Joining Form -->
    <!-- Start row -->
    <div class="row">
        <div class="col-md-12">
            <!-- Start accordion -->
            <div id="accordion" class="">
                <!-- Start First collapse -->
                @php $count = 0 @endphp
                @forelse($histories as $history)
                    @php $count += 1 @endphp
                    <div class="panel checkout-step">
                        <div role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$history->year}}" >
                            <div class="row">
                                <div class="col-10 col-lg-10">
                                    <span class="checkout-step-number">{{$count}}</span>
                                    <h4 class="checkout-step-title"> <a role="button">{{$history->year}}</a></h4>
                                </div>

                                <div class="col-2 col-lg-2 text-right d-none d-sm-block d-md-block d-lg-block d-xl-block">
                                    <button id="nextBtn" name="nextBtn" class="btn btn-default imc-jfeditbtn">Details <i class="fa fa-eye"></i></button>
                                </div>

                                <div class="col-2 col-lg-2 text-right d-md-none d-lg-none">
                                    <button id="nextBtn" name="nextBtn" class="btn btn-default imc-jfeditbtn"><i class="fa fa-edit"></i></button>
                                </div>
                            </div>

                        </div>
                        <div id="collapse{{$history->year}}" class="collapse in">
                            <!-- Start collapse body -->
                            <div class="checkout-step-body">
                                <!-- Start row -->
                                <div style="padding-left:10px;">
                                    <p>{!! $history->description !!}</p>
                                </div>
                                <!-- End row -->
                            </div>
                            <!-- End collapse body -->
                        </div>
                    </div>
                @empty
                    <p>No history details added</p>
                @endforelse
                <!-- End First collapse -->

            </div>
            <!-- End accordion -->

        </div>
    </div>
    <!-- End row -->
</div>
