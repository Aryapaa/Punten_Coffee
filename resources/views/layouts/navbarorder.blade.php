<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('asset/front-end/css/style.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{url('asset/front-end/css/menu.css')}}">
    <!-- <link rel="stylesheet" href="{{url('asset/front-end/css/reservation.css')}}"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('pages.ordermenu') }}"><i><span style="color: brown;">Punten</span>
                    Coffee.</i></a>
            <a class="btn" href="{{ route('pages.cart') }}">
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.42346 2.4787C2.32183 2.44335 2.21419 2.42853 2.10678 2.43512C1.99938 2.4417 1.89435 2.46955 1.7978 2.51706C1.70125 2.56456 1.6151 2.63077 1.54434 2.71184C1.47359 2.79291 1.41964 2.88723 1.38563 2.98932C1.35163 3.09141 1.33824 3.19924 1.34625 3.30655C1.35425 3.41385 1.38349 3.5185 1.43227 3.61441C1.48105 3.71033 1.5484 3.7956 1.6304 3.86527C1.7124 3.93495 1.80743 3.98764 1.90996 4.02029L2.19704 4.1167C2.92937 4.36045 3.41471 4.52404 3.77112 4.68979C4.10912 4.84687 4.25537 4.97362 4.34854 5.10362C4.44279 5.23362 4.51646 5.41129 4.55871 5.78179C4.60312 6.17287 4.60421 6.6842 4.60421 7.45662V10.3513C4.60421 11.8322 4.60421 13.0271 4.73096 13.9664C4.86096 14.9414 5.14262 15.7625 5.79479 16.4147C6.44587 17.0669 7.26813 17.3464 8.24312 17.4775C9.18129 17.6042 10.3762 17.6042 11.8571 17.6042H19.5C19.7155 17.6042 19.9222 17.5186 20.0746 17.3662C20.2269 17.2139 20.3125 17.0072 20.3125 16.7917C20.3125 16.5762 20.2269 16.3696 20.0746 16.2172C19.9222 16.0648 19.7155 15.9792 19.5 15.9792H11.9167C10.3621 15.9792 9.27771 15.977 8.45871 15.8676C7.66462 15.7604 7.24321 15.5643 6.94312 15.2653C6.68854 15.0107 6.50979 14.6684 6.39496 14.0834H17.3583C18.3972 14.0834 18.9161 14.0834 19.3235 13.8147C19.7308 13.546 19.9355 13.0694 20.345 12.1139L20.8087 11.0305C21.6862 8.98304 22.125 7.96037 21.6429 7.2302C21.1608 6.50004 20.0482 6.50004 17.8209 6.50004H6.22379C6.22078 6.19861 6.20379 5.89748 6.17287 5.59762C6.11329 5.0722 5.98221 4.59012 5.66696 4.15354C5.35171 3.71587 4.93571 3.43854 4.45687 3.21645C4.00512 3.00629 3.43204 2.81562 2.75387 2.58812L2.42346 2.4787ZM8.12504 19.5C8.55602 19.5 8.96934 19.6712 9.27409 19.976C9.57884 20.2807 9.75004 20.6941 9.75004 21.125C9.75004 21.556 9.57884 21.9693 9.27409 22.2741C8.96934 22.5788 8.55602 22.75 8.12504 22.75C7.69406 22.75 7.28074 22.5788 6.97599 22.2741C6.67125 21.9693 6.50004 21.556 6.50004 21.125C6.50004 20.6941 6.67125 20.2807 6.97599 19.976C7.28074 19.6712 7.69406 19.5 8.12504 19.5ZM17.875 19.5C18.306 19.5 18.7193 19.6712 19.0241 19.976C19.3288 20.2807 19.5 20.6941 19.5 21.125C19.5 21.556 19.3288 21.9693 19.0241 22.2741C18.7193 22.5788 18.306 22.75 17.875 22.75C17.4441 22.75 17.0307 22.5788 16.726 22.2741C16.4212 21.9693 16.25 21.556 16.25 21.125C16.25 20.6941 16.4212 20.2807 16.726 19.976C17.0307 19.6712 17.4441 19.5 17.875 19.5Z"
                        fill="#8B0C0C" />
                </svg>

            </a>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>
