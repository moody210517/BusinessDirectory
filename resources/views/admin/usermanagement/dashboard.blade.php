@extends('admin.main')
@section('content')   
    <div class="page-container" id="page-container">
        <div class="page-title padding pb-0 ">
            <h2 class="text-md mb-0">Dashboard</h2>
        </div>
        <div class="padding">
            <div class="row row-sm">
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="row row-sm">
                        <div class="col-lg-12 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <sup class="text-muted">$</sup>
                                        <span class="h3" data-plugin="countTo" data-option="{
                                            from: 50,
                                            to: 2350,
                                            refreshInterval: 10,
                                            formatter: function (value, options) {
                                            return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                            }
                                            }"></span>
                                        <div class="text-muted mt-2 text-sm">Your current balance</div>
                                        <div>
                                            <span class="text-success">+ 20%</span> 
                                            <span class="text-muted">($520)</span>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm w-100 btn-rounded btn-danger text-align-auto i-con-h-a mb-2">
                                    <i class="i-con i-con-arrow-right float-right"><i></i></i>
                                    Add Credit
                                    </button>
                                </div>
                                <div class="card-body b-t">
                                    <div class="row no-gutters">
                                        <div class="col">
                                            <small class="text-muted">Sales: 75%</small>
                                            <div class="progress my-2" style="height:3px;">
                                                <div class="progress-bar bg-primary" style="width: 45%"></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <small class="text-muted">Referral: 25%</small>
                                            <div class="progress my-2" style="height:3px;">
                                                <div class="progress-bar bg-warning" style="width: 35%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex i-con-h-a">
                                        <span class="text-md">
                                        <span  data-plugin="countTo" data-option="{
                                            from: 5,
                                            to: 85,
                                            refreshInterval: 1,
                                            speed: 1000,
                                            formatter: function (value, options) {
                                            return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                            }
                                            }"></span>
                                        %</span>
                                        <span class="mx-2 mt-1">
                                        <i class="i-con i-con-trending-up text-success"><i></i></i>
                                        <small class="mx-1 text-muted">5% up</small>
                                        </span>
                                    </div>
                                    <div class="text-muted text-sm">From the last month</div>
                                </div>
                                <div style="height: 168px">
                                    <canvas data-plugin="chartjs" id="chart-line-4"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <div class="block px-4 py-3">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="d-flex align-items-center i-con-h-a my-1">
                                    <div>
                                        <span class="avatar w-40 b-a b-2x">
                                        <i class="i-con i-con-comment b-2x text-primary"><i></i></i>
                                        </span>
                                    </div>
                                    <div class="mx-3">
                                        <a href="#" class="d-block ajax"><strong>60</strong></a>
                                        <small class="text-muted">Messages</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="d-flex align-items-center i-con-h-a my-1">
                                    <div>
                                        <span class="avatar w-40 b-a b-2x">
                                        <i class="i-con i-con-history b-2x text-success"><i></i></i>
                                        </span>
                                    </div>
                                    <div class="mx-3">
                                        <a href="#" class="d-block ajax"><strong>12:20</strong></a>
                                        <small class="text-muted">Task</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="d-flex align-items-center i-con-h-a my-1">
                                    <div>
                                        <span class="avatar w-40 b-a b-2x">
                                        <i class="i-con i-con-users b-2x text-warning"><i></i></i>
                                        </span>
                                    </div>
                                    <div class="mx-3">
                                        <a href="#" class="d-block ajax"><strong>5,050</strong></a>
                                        <small class="text-muted">Users</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="d-flex align-items-center i-con-h-a my-1">
                                    <div>
                                        <span class="avatar w-40 b-a b-2x">
                                        <i class="i-con i-con-mail b-2x text-danger"><i></i></i>
                                        </span>
                                    </div>
                                    <div class="mx-3">
                                        <a href="#" class="d-block ajax"><strong>302</strong></a>
                                        <small class="text-muted">Mails</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-sm">
                        <div class="col-md-8">
                            <div class="card p-4">
                                <div class="pb-4">
                                    <div class="d-flex mb-3">
                                        <span class="text-md">Marketing</span>
                                        <span class="flex"></span>
                                        <label class="ui-switch mt-1">
                                        <input type="checkbox" checked>
                                        <i></i>
                                        </label>
                                    </div>
                                    <div class="d-flex">
                                        <div class="i-con-h-a">
                                            <small class="text-muted">This Week</small>
                                            <div class="mt-1">
                                                <span class="text-primary text-md">$32,000</span>
                                                <i class="i-con i-con-trending-up text-success"><i></i></i>
                                                <small class="mx-1 text-muted">+5%</small>
                                            </div>
                                        </div>
                                        <div class="i-con-h-a mx-3">
                                            <small class="text-muted">Last Week</small>
                                            <div class="mt-1">
                                                <span class="text-muted text-md">$25,000</span>
                                                <i class="i-con i-con-trending-down text-danger"><i></i></i>
                                                <small class="mx-1 text-muted">-10%</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="height: 266px">
                                    <canvas data-plugin="chartjs" id="chart-line-5"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success--lt p-4">
                                <div>
                                    <span class="text-fade">Online sells</span>
                                    <div class="_300">$5,000</div>
                                </div>
                                <div style="height: 60px">
                                    <canvas data-plugin="chartjs" id="chart-line-6"></canvas>
                                </div>
                            </div>
                            <div class="card">
                                <div class="p-4">
                                    <p><strong>Trending</strong></p>
                                    <div class="easypiechart" data-plugin="easyPieChart" data-option="{barColor: theme.color.primary}" data-percent="75" data-line-width="3" data-size="110" data-scale-length="0" data-line-cap="square">
                                        <div>
                                            <span class="text-primary text-md">75%</span>
                                            <small class="text-muted">Trending up</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="row">
                                        <div class="col">
                                            <div>$6,000</div>
                                            <small class="text-muted">Target</small>
                                        </div>
                                        <div class="col">
                                            <div>$2,500</div>
                                            <small class="text-muted">Last Month</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                                                
            </div>
        </div>
    </div>
@stop
