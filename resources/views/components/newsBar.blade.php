@push('style')
    <style>
        #news-bar {
            width: 100%;
            background-color: #f1faff;
            overflow: hidden;
        }

        #news-bar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            white-space: nowrap;
            animation: ticker 15s linear infinite;
        }

        #news-bar li {
            display: inline;
            margin-right: 30px;
        }

        #news-bar li a {
            color: #009ef7;
            font-size: 25px;
            text-decoration: none;
        }

        @keyframes ticker {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
    </style>
@endpush
@props(array('notifications' => null))
@if($notifications)
    <div id="news-bar" style="direction: rtl">
        <ul>
            @foreach($notifications as $notification)
                <li><a href="#" style="font-size: 20px;">{{$notification}}</a></li>
            @endforeach
        </ul>
    </div>
@endif
