<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kiosk Report</title>
</head>

<style>



    body {
        font-family: Calibri;
        margin: 0px;
    }

    .long-size {
        width: 8.5in;
        height: 13in;


    }

    @media print {
        .pagebreak {
            page-break-after: always;
        }

        button, a.links {
            display: none;
        }
    }

    .text {
        font-size: 8px;
    }

    .header {
        text-align: center;

    }

    table {
        width: 100%;
    }

    #logo1 {
        position: absolute;
        top: 5px;
        left: 45px;

    }

    #logo2 {
        position: absolute;
        top: 5px;
        left: 650px;

    }
    .border{
        border: solid black 1px;
        border-collapse: collapse;
    }


</style>

<body>

<div id="logo1">
    <img style="width: 110px" src="{{asset('public/storage/seal1917.png')}}">
</div>

<div id="logo2">
    <img style="width: 110px" src="{{asset('public/storage/it-logo.png')}}">
</div>

<div class="long-size">

    <div class="header">
        <table>
            <tr>
                <td>Republic of the Philippines</td>
            </tr>
            <tr>
                <td>Province of Bukidnon</td>
            </tr>
            <tr style="font-size: larger; font-weight: bold">
                <td>MUNICIPALITY OF MANOLO FORTICH</td>
            </tr>
            <tr style="font-size: xx-large; font-weight: bolder; font-style: italic; font-family: Adobe Caslon Pro">
                <td>Information Technology Division</td>
            </tr>

            <tr style="font-size: larger; font-weight: bolder; font-family: 'Calibri Light'">
                <td>Clients as of {{$monthfrom}}</td>
            </tr>
        </table>


    </div>
    <br>
    <div>
        <table>
            <tr>
                <td width="100px" style="text-align: center;">Count:</td>
                <td width="100px" style="border-bottom: solid black 1px; text-align: center">{{$clients->count()}}</td>
                <td width="150px"></td>
                <td width="100px" style="text-align: center;">Date:</td>
                <td width="150px" style="border-bottom: solid black 1px; text-align: center">{{date('F d, Y')}}</td>

            </tr>
        </table>
    </div>

    <br>

    <div>
        <table class="border">
            <thead>
            <tr>
                <th width="25px" class="border">No.</th>
                <th width="150px" class="border">FULLNAME</th>
                <th width="100px" class="border">BARANGAY</th>
                <th width="200px" class="border">PURPOSE</th>
                <th width="75px" class="border">OFFICE</th>
            </tr>
            </thead>
            <tbody>

            <?php $temp = 0;?>
            @foreach($clients as $client)
                <tr>
                    <?php $temp++;?>

                    <td class="border">{{$temp}}</td>
                    <td class="border" style="text-transform: uppercase">{{$client->name}}</td>
                    <td class="border" style="text-transform: uppercase">{{$client->barangay->name}}</td>
                    <td class="border" style="text-transform: uppercase">{{$client->clientservice->service->description}}</td>
                    <td class="border" style="text-transform: uppercase">{{$client->clientservice->service->office->code}}</td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <br>
    <div id="buttons">
        {{--<a href="{{route('regular.index')}}"> <button>BACK</button></a>--}}
        {{--<a target = "_blank" href="{{route('regular.edit',$regular->id)}}"> <button>EDIT</button></a>--}}
        {{--<a target = "_blank" href="http://manolofortich.com.ph/hris/"> <button>EDIT HRIS</button></a>--}}
        <button class="btn btn-primary btn-lg" onclick="printwindow()"> PRINT</button>
    </div>


</div>



{{--<div style="background-image: url('{{asset($path)}}');--}}
{{--background-repeat: no-repeat;background-size:325px 204px; " >--}}




<script>
    function printwindow() {
        window.print();
    }

</script>


</body>
</html>