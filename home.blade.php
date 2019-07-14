@extends('layouts.app')

@section('custom-meta')
    <title>{{ auth()->user()->siteSetting->company_name ?? auth()->user()->member->siteSetting->company_name }} - Dashboard </title>
@endsection

@section('content')
    <div class="container">
                <div class="content-heading clearfix">
                    <div class="heading-left">
                        <h1 class="page-title">Dashboard</h1>
                        <p class="page-subtitle">Welcome back! [{{ auth()->user()->first_name .' '.auth()->user()->last_name }}]</p>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <!-- METRICS -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="widget widget-metric_8">
                                    <div class="heading clearfix">
                                        <span class="title">Last Week SMS</span>
                                        <div class="dropdown">
                                            <a href="#" class="toggle-dropdown" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="fa fa-refresh"></i> Refresh</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <i class="ti-email custom-text-blue4"></i>
                                    <span class="value">{{ $lastWeekSms->count() }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="widget widget-metric_8">
                                    <div class="heading clearfix">
                                        <span class="title">Last Week Cost</span>
                                        <div class="dropdown">
                                            <a href="#" class="toggle-dropdown" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="fa fa-refresh"></i> Refresh</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <i class="ti-wallet custom-text-purple"></i>
                                    <span class="value">{{ $lastWeekCost }} Tk</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="widget widget-metric_8">
                                    <div class="heading clearfix">
                                        <span class="title">Balance</span>
                                        <div class="dropdown">
                                            <a href="#" class="toggle-dropdown" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="fa fa-refresh"></i> Refresh</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <i class="ti-wallet custom-text-green3"></i>
                                    <span class="value{{ auth()->user()->expire_date < date('Y-m-d H:i:s') ? ' custom-text-red' : '' }}">{{ auth()->user()->balance }} Tk</span>
                                </div>
                            </div>
                        </div>
                        <!-- END METRICS -->
                        <!-- CAMPAIGN RESULT -->
                        <div class="panel panel-tab">
                            <div class="panel-heading">
                                <h3 class="panel-title">Campaign Result</h3>

                            </div>
                            <div class="panel-body">
                                <div class="tab-content no-padding">
                                    <!-- tab 1 -->
                                    <div class="tab-pane fade in active" id="tab1">
                                        <div class="top margin-bottom-50">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="period font-13">
                                                        <span>{{ \Carbon\Carbon::now()->subDays(6)->format('M d, Y') . ' - ' . \Carbon\Carbon::now()->format('M d, Y') }} (previous)</span>
                                                    </div>
                                                    <div class="margin-bottom-30 visible-xs"></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <select class="form-control">
                                                        <option>7 Days</option>
                                                        <option>1 Month</option>
                                                        <option>3 Months</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-layout dashed-separator">
                                            <div class="panel-cols-2">
                                                <div class="widget-metric_9 text-center">
                                                    <span class="title">Delivered</span>
                                                    @php
                                                        $deliveredWeekSms = $lastWeekSms->where('status', 'DELIVERED');
                                                        $prevDelWeekSmsCount = $prevWeekSms->where('status', 'DELIVERED')->count();
                                                        $delChange = $prevDelWeekSmsCount > 0 ? (($deliveredWeekSms->count() - $prevDelWeekSmsCount) * 100)/$prevDelWeekSmsCount : 0;
                                                    @endphp

                                                    <span class="value">{{ $deliveredWeekSms->count() }}</span>
                                                    <span class="percentage{{ $delChange >= 0 ? ' text-indicator-green' : ' text-indicator-red' }}"><i class="fa{{ $delChange >= 0 ? ' fa-sort-up' : ' fa-sort-down' }}"></i> {{ number_format($delChange, 2) }}%</span>
                                                    <span class="text-muted">vs. {{ $prevDelWeekSmsCount }} (previous)</span>
                                                    <div class="inlinesparkline margin-top-50">
                                                        @php
                                                            $deliveredWeekSms = $deliveredWeekSms->groupBy(function ($item){
                                                                return $item->created_at->format('Y-m-d');
                                                            })->sortBy(function($item){
                                                                return $item->count();
                                                            });
                                                            //dd($deliveredWeekSms);
                                                        @endphp
                                                        @foreach($deliveredWeekSms as $dsms)
                                                            {{ $dsms->count() }}@if(!$loop->last),@endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-cols-2">
                                                <div class="widget-metric_9 text-center">
                                                    <span class="title">Failed</span>

                                                    @php
                                                        $failedWeekSms = $lastWeekSms->whereIn('status', ['FAILED', 'REJECTED']);
                                                        $prevFdWeekSmsCount = $prevWeekSms->whereIn('status', ['FAILED', 'REJECTED'])->count();
                                                        $failChange = $prevFdWeekSmsCount > 0 ? (($failedWeekSms->count() - $prevFdWeekSmsCount) * 100)/$prevFdWeekSmsCount : 0;
                                                    @endphp

                                                    <span class="value">{{ $failedWeekSms->count() }}</span>
                                                    <span class="percentage{{ $failChange >= 0 ? ' text-indicator-green' : ' text-indicator-red' }}"><i class="fa{{ $failChange >= 0 ? ' fa-sort-up' : ' fa-sort-down' }}"></i> {{ number_format($failChange, 2) }}%</span>
                                                    <span class="text-muted">vs. {{ $prevFdWeekSmsCount }} (previous)</span>
                                                    <div class="inlinesparkline margin-top-50">
                                                        @php
                                                            $failedWeekSms = $failedWeekSms->groupBy(function ($item){
                                                                return $item->created_at->format('Y-m-d');
                                                            })->sortBy(function($item){
                                                                return $item->count();
                                                            });
                                                            //dd($failedWeekSms);
                                                        @endphp
                                                        @foreach($failedWeekSms as $dsms)
                                                            {{ $dsms->count() }}@if(!$loop->last),@endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end tab 1 -->

                                </div>
                            </div>
                        </div>
                        <!-- END CAMPAIGN RESULT -->

                    </div>
                    <div class="col-md-3">
                        <!-- VISIT DURATION -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Recent Transactions</h3>
                            </div>
                            <div class="panel-body" style="padding: 10px">
                                <table class="table table-bordered no-margin-bottom">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentTransactions as $transaction)
                                            <tr>
                                                <td class="text-muted">{{ date('d-m-Y, H:i', strtotime($transaction->created_at)) }}</td>
                                                <td class="text-right">TK{{ $transaction->amount }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END VISIT DURATION -->

                        <!-- SALES CHART -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Recent Campaign</h3>
                            </div>
                            <div class="panel-body" style="padding: 10px">
                                <table class="table table-bordered no-margin-bottom">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentCampaigns as $campaign)
                                            <tr>
                                                <td class="text-muted">{{ $campaign->name }}</td>
                                                <td class="text-right">{{ date('d-m-Y, H:i', strtotime($campaign->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END SALES CHART -->
                    </div>
                </div>

            </div>
        <!-- END MAIN CONTENT -->
@endsection