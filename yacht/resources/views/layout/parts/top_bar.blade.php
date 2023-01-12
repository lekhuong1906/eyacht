@php
    $notifications = \Illuminate\Support\Facades\Session::get('notifications')
@endphp
<ul class="nav top-menu">
    <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle dropdown-notifications " aria-expanded="false"
           href="#">
            <i class="fa fa-tasks"></i>
            <span class="badge bg-success">{{count($notifications)}}</span>
        </a>
        <ul class="dropdown-menu extended tasks-bar">
            <li>
                <p class="red">You have {{count($notifications)}} Mails</p>
            </li>
            @foreach ($notifications as $notification)
                <li>
                    <a href="{{URL::to('/add-leases/'.$notification->data['id'])}}">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5 class="dropdown-toolbar-title">{{$notification->data['title']}}</h5>
                                <p>{{$notification->data['content']}}</p>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach

            {{--<li>
                <a href="#">
                    <div class="task-info clearfix">
                        <div class="desc pull-left">
                            <h5 class="dropdown-toolbar-title">Notifications(<span
                                    class="notif-count">0</span>)</h5>
                        </div>
                        <span class="notification-pie-chart pull-right" data-percent="90">
                <span class="percent"></span>
                </span>
                    </div>
                </a>
            </li>

            <li class="external">
                <a href="#">See All Tasks</a>
            </li>--}}
        </ul>
    </li>

    <!-- inbox dropdown start-->
    <li id="header_inbox_bar" class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle " href="#">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-important">4</span>
        </a>
        <ul class="dropdown-menu extended inbox">
            <li>
                <p class="red">You have 4 Mails</p>
            </li>
            <li>
                <a href="#">
                                <span class="photo"><img alt="avatar"
                                                         src="{{asset('public/backend/images/3.png')}}"></span>
                    <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                    <span class="message">
                                    Hello, this is an example msg.
                                </span>
                </a>
            </li>
            <li>
                <a href="#">See all messages</a>
            </li>
        </ul>
    </li>
    <!-- inbox dropdown end -->
    <!-- notification dropdown start-->
    <li id="header_notification_bar" class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <i class="fa fa-bell-o"></i>
            <span class="badge bg-warning">3</span>
        </a>
        <ul class="dropdown-menu extended notification">
            <li>
                <p>Notifications</p>
            </li>
            <li>
                <div class="alert alert-info clearfix">
                    <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                    <div class="noti-info">
                        <a href="#"> Server #1 overloaded.</a>
                    </div>
                </div>
            </li>
        </ul>
    </li>
</ul>
