@extends('customers.layouts.master')
@push('styles')
    <style>
        .dashboard-cards {
            position: relative;
            padding-bottom: 50px;
            margin: 0 !important;
        }

        .dashboard-cards .card {
            background: #ffffff;
            display: inline-block;
            perspective: 1000;
            z-index: 20;
            padding: 0 !important;
            margin: 5px 5px 10px 5px;
            position: relative;
            text-align: left;
            transition: all 0.3s 0s ease-in;
            z-index: 1;
            /*width: calc(33.33333333% - 10px);*/
            /*width: 100%;*/
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dashboard-cards .card:hover {
            box-shadow: 0 15px 10px -10px rgba(31, 31, 31, 0.5);
            transition: all 0.3s ease;
        }

        .dashboard-cards .card .card-title {
            background: #ffffff;
            padding: 20px 15px;
            position: relative;
            z-index: 0;
        }

        .dashboard-cards .card .card-title h2 {
            font-size: 24px;
            letter-spacing: -0.05em;
            margin: 0;
            padding: 0;
        }

        .dashboard-cards .card .card-title h2 small {
            display: block;
            font-size: 14px;
            margin-top: 8px;
            letter-spacing: -0.025em;
        }

        .dashboard-cards .card .card-description {
            position: relative;
            font-size: 14px;
            border-top: 1px solid #ddd;
            padding: 10px 15px 0 15px;
        }

        .dashboard-cards .card .card-actions {
            box-shadow: 0 2px 0px 0 rgba(0, 0, 0, 0.075);
            padding: 10px;
            text-align: center;
        }

        .dashboard-cards .card .card-flap {
            background: #d9d9d9;
            position: absolute;
            width: 100%;
            transform-origin: top;
            transform: rotateX(-90deg);
        }

        .dashboard-cards .card .flap1 {
            transition: all 0.3s 0.3s ease-out;
            z-index: -1;
        }

        .dashboard-cards .card .flap2 {
            transition: all 0.3s 0s ease-out;
            z-index: -2;
        }

        .dashboard-cards.showing .card {
            cursor: pointer;
            opacity: 0.6;
            transform: scale(0.88);
        }

        .dashboard-cards .no-touch .dashboard-cards.showing .card:hover {
            opacity: 0.94;
            transform: scale(0.92);
        }

        .dashboard-cards .card.d-card-show {
            opacity: 1 !important;
            transform: scale(1) !important;
        }

        .dashboard-cards .card.d-card-show .card-flap {
            background: #ffffff;
            transform: rotateX(0deg);
        }

        .dashboard-cards .card.d-card-show .flap1 {
            transition: all 0.3s 0s ease-out;
        }

        .dashboard-cards .card.d-card-show .flap2 {
            transition: all 0.3s 0.2s ease-out;
        }

        .dashboard-cards .card .task-count {
            width: 40px;
            height: 40px;
            position: absolute;
            top: 22px;
            right: 10px;
            background: #1B5E20;
            text-align: center;
            line-height: 40px;
            border-radius: 100%;
            color: #fff;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .dashboard-cards .task-list {
            padding: 0 !important;
        }

        .dashboard-cards .task-list li {
            padding: 10px 0;
            padding-left: 10px;
            margin: 3px 0;
            list-style-type: none;
            border-bottom: 1px solid #e9ebed;
            border-left: 3px solid #f36525;
            transition: all 0.2s ease;
        }

        .dashboard-cards .task-list li:hover {
            background: #ecf0f1;
            transition: all 0.2s ease;
        }

        .dashboard-cards .task-list li span {
            float: right;
            color: #f36525;
            margin-right: 5px;
        }

        .dashboard-cards.showing .card.d-card-show .task-count {
            color: #ffffff;
            background: #f36525;
            transition: all 0.2s ease;
        }

        .dashboard-cards .card-actions .btn {
            color: #333;
        }

        .dashboard-cards .card-actions .btn:hover {
            color: #f36525;
        }
    </style>
@endpush
@section('content')
    <section class="content-grid" style="margin-top: 1em">
        <div class="images-banner" style="height: 10em;background-image: url({{asset('website/images/ui/banner003@2x.png')}});background-size: cover ">
            <p style="padding-top: 2em;font-size: 2em;color: #fff" align="middle">All Categories</p>
        </div>
    </section>

    <div class="container" style="margin-top: 5em">
        <div class="row">

            <div class='row dashboard-cards'>
                <div class='card col-md-6 col-lg-4'>
                    <div class='card-title'>
                        <h2>
                            Contact Task
                            <small>You have 14 pending tasks</small>
                        </h2>
                        <div class='task-count'>
                            14
                        </div>
                    </div>
                    <div class='card-flap flap1'>
                        <div class='card-description'>
                            <ul class='task-list'>
                                <li>
                                    Sent Question Pending
                                    <span>59%</span>
                                </li>
                                <li>
                                    Sent Answer Pending
                                    <span>11%</span>
                                </li>
                                <li>
                                    File Attchment Pending
                                    <span>100%</span>
                                </li>
                                <li>
                                    Document Send Pending
                                    <span>7%</span>
                                </li>
                            </ul>
                        </div>
                        <div class='card-flap flap2'>
                            <div class='card-actions'>
                                <a class='btn' href='#'>Close</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='card col-md-6 col-lg-4'>
                    <div class='card-title'>
                        <h2>
                            Product Task
                            <small>You have 101 pending tasks</small>
                        </h2>
                        <div class='task-count'>
                            101
                        </div>
                    </div>
                    <div class='card-flap flap1'>
                        <div class='card-description'>
                            <ul class='task-list'>
                                <li>
                                    Sent Question Pending
                                    <span>59%</span>
                                </li>
                                <li>
                                    Sent Answer Pending
                                    <span>11%</span>
                                </li>
                                <li>
                                    File Attchment Pending
                                    <span>100%</span>
                                </li>
                                <li>
                                    Document Send Pending
                                    <span>7%</span>
                                </li>
                            </ul>
                        </div>
                        <div class='card-flap flap2'>
                            <div class='card-actions'>
                                <a class='btn' href='#'>Close</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='card col-md-6 col-lg-4'>
                    <div class='card-title'>
                        <h2>
                            Document Task
                            <small>You have 9 pending tasks</small>
                        </h2>
                        <div class='task-count'>
                            9
                        </div>
                    </div>
                    <div class='card-flap flap1'>
                        <div class='card-description'>
                            <ul class='task-list'>
                                <li>
                                    Sent Question Pending
                                    <span>59%</span>
                                </li>
                                <li>
                                    Sent Answer Pending
                                    <span>11%</span>
                                </li>
                                <li>
                                    File Attchment Pending
                                    <span>100%</span>
                                </li>
                                <li>
                                    Document Send Pending
                                    <span>7%</span>
                                </li>
                            </ul>
                        </div>
                        <div class='card-flap flap2'>
                            <div class='card-actions'>
                                <a class='btn' href='#'>Close</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='card col-md-6 col-lg-4'>
                    <div class='card-title'>
                        <h2>
                            Contact Task
                            <small>You have 76 pending tasks</small>
                        </h2>
                        <div class='task-count'>
                            76
                        </div>
                    </div>
                    <div class='card-flap flap1'>
                        <div class='card-description'>
                            <ul class='task-list'>
                                <li>
                                    Sent Question Pending
                                    <span>59%</span>
                                </li>
                                <li>
                                    Sent Answer Pending
                                    <span>11%</span>
                                </li>
                                <li>
                                    File Attchment Pending
                                    <span>100%</span>
                                </li>
                                <li>
                                    Document Send Pending
                                    <span>7%</span>
                                </li>
                            </ul>
                        </div>
                        <div class='card-flap flap2'>
                            <div class='card-actions'>
                                <a class='btn' href='#'>Close</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='card col-sm-12 col-md-6 col-lg-4'>
                    <div class='card-title'>
                        <h2>
                            Agreement Task
                            <small>You have 43 pending tasks</small>
                        </h2>
                        <div class='task-count'>
                            43
                        </div>
                    </div>
                    <div class='card-flap flap1'>
                        <div class='card-description'>
                            <ul class='task-list'>
                                <li>
                                    Sent Question Pending
                                    <span>59%</span>
                                </li>
                                <li>
                                    Sent Answer Pending
                                    <span>11%</span>
                                </li>
                                <li>
                                    File Attchment Pending
                                    <span>100%</span>
                                </li>
                                <li>
                                    Document Send Pending
                                    <span>7%</span>
                                </li>
                            </ul>
                        </div>
                        <div class='card-flap flap2'>
                            <div class='card-actions'>
                                <a class='btn' href='#'>Close</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='card col-sm-12 col-md-6 col-lg-4'>
                    <div class='card-title'>
                        <h2>
                            Audit Task
                            <small>You have 24 pending tasks</small>
                        </h2>
                        <div class='task-count'>
                            24
                        </div>
                    </div>
                    <div class='card-flap flap1'>
                        <div class='card-description'>
                            <ul class='task-list'>
                                <li>
                                    Sent Question Pending
                                    <span>59%</span>
                                </li>
                                <li>
                                    Sent Answer Pending
                                    <span>11%</span>
                                </li>
                                <li>
                                    File Attchment Pending
                                    <span>100%</span>
                                </li>
                                <li>
                                    Document Send Pending
                                    <span>7%</span>
                                </li>
                            </ul>
                        </div>
                        <div class='card-flap flap2'>
                            <div class='card-actions'>
                                <a class='btn' href='#'>Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            var zindex = 10;

            $("div.card").click(function(e){
                e.preventDefault();

                var isShowing = false;

                if ($(this).hasClass("d-card-show")) {
                    isShowing = true
                }

                if ($("div.dashboard-cards").hasClass("showing")) {
                    // a card is already in view
                    $("div.card.d-card-show")
                        .removeClass("d-card-show");

                    if (isShowing) {
                        // this card was showing - reset the grid
                        $("div.dashboard-cards")
                            .removeClass("showing");
                    } else {
                        // this card isn't showing - get in with it
                        $(this)
                            .css({zIndex: zindex})
                            .addClass("d-card-show");

                    }

                    zindex++;

                } else {
                    // no dashboard-cards in view
                    $("div.dashboard-cards")
                        .addClass("showing");
                    $(this)
                        .css({zIndex:zindex})
                        .addClass("d-card-show");

                    zindex++;
                }

            });
        });
    </script>
@endpush
