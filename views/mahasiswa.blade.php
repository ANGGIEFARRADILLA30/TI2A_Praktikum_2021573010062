<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <link href="/css/bootstrap.min.css" rel="stylesheet"> 
    <title>Data Mahasiswa</title> 
</head> 
<body> 
    <div class="container text-center mt-3 pt-3 bg-white"> 
    <h1 class="bg-dark px-3 py-1 text-white d-inline-block"> 
    <?php echo $nama?> 
    </h1> 
    <h1 class="bg-dark px-3 py-1 text-white d-inline-block"> 
    <?php echo $nilai ?>
</h1>
</div>
</body>
</html>


<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <link href="/css/bootstrap.min.css" rel="stylesheet"> 
    <title>Data Mahasiswa</title> 
</head> 
<body> 
    <div class="container text-center mt-3 pt-3 bg-white"> 
        <h1 class="bg-dark px-3 py-1 text-white d-inline-block"> 
            {{ $nama }}
            </h1> 
            <h1 class="bg-dark px-3 py-1 text-white d-inline-block"> 
                {{ $nilai }}
            </h1> 
        </div> 
        
</body> 
</html>

<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <link href="/css/bootstrap.min.css" rel="stylesheet"> 
        <title>Data Mahasiswa</title> 
    </head> 
    <body> 
        <div class="container text-center mt-3 py-3 bg-white"> 
            <h1 class="bg-dark px-3 py-1 text-white d-inline-block"> 
                {{ $nama }} 
            </h1> 
            <h1 class="bg-dark px-3 py-1 text-white d-inline-block"> 
                {{ $nilai }} 
                <h1> 
        </div> 
    </body> 
    </html>

    <div class="container text-center mt-3 py-3 bg-white"> 
    <h1 class="bg-dark px-3 py-1 text-white d-inline-block"> 
        {!! $nama !!} 
    </h1> 
    <h1 class="bg-dark px-3 py-1 text-white d-inline-block"> 
        {!! Snilai !!} 
        <h1> 
        </div>

        <div class="container text-center mt-3 pt-3 bg-white"> 
            <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{ $nama }}</h1> 
            <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{ $nilai }}</h1> 
            <br> @if (($nilai >= 0) and ($nilai < 50)) 
            <div class="alert alert-danger d-inline-block"> 
                Maaf, anda tidak lulus 
            </div> @elseif (($nilai >= 50) and (Snilai <= 100)) 
            <div class="alert alert-success d-inline-block"> 
                Selamat, anda lulus 
            </div>
             @endif 
        </div>
        </div>

        <div class="container text-center mt-3 pt-3 bg-white"> 
            <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{ $nama }}</h1> 
            <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{ $nilai }}</h1> 
            <br> 
            @if ((Snilai >= 0) and (Snilai < 50)) 
            <div class="alert alert-danger d-inline-block">Maaf, anda tidak lulus</div> 
            @elseif (($nilai >= 50) and ($nilai <= 100)) 
            <div class="alert alert-success d-inline-block">Selamat, anda lulus</div> 
            @else 
            <div class="alert alert-dark d-inline-block">Nilai tidak valid</div> 
            @endif 
            </div>

            <div class="container text-center mt-3 pt-3 bg-white"> 
            <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{ $nama }}</h1> 
            <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{ $nilai }}</h1> 
            <br> 
            @switch($nilai) 
            @case(0) 
            <div class="alert alert-danger d-inline-block">Tidak ikut ujian</div> 
            @break @case(75) 
            <div class="alert alert-success d-inline-block">Lumayan</div> 
            @break 
            @case(100) 
            <div class="alert alert-success d-inline-block">Sempurna</div> 
            @break 
            @default 
            <div class="alert alert-dark d-inline-block">Nilai tidak valid</div> 
            @endswitch 
            </div>

            <div class="container text-center mt-3 pt-3 bg-white"> 
                @for ($i = 0; $i < 5; $i++) 
                <div class="alert alert-info d-inline-block"> 
                    Laravel 
                </div> 
                @endfor 
            </div>

            <div class="container text-center mt-3 pt-3 bg-white"> 
                @for ($i= 0; $i < 5; $i++) 
                <div class="alert alert-info d-inline-block">
                    {{ $i}} 
                </div> 
                @endfor 
                </div>

                <div class="container text-center mt-3 pt-3 bg-white"> 
                    <?php $i = 0; ?> 
                    @while($i < 5) 
                    <div class="alert alert-info d-inline-block"> 
                        {{ $i}} 
                    </div> 
                    <?php $i++ ?> 
                    @endwhile 
                </div>

                <div class="container text-center mt-3 pt-3 bg-white"> 
                <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{$nama}}</h1> 
                <br> 
                @foreach ($nilai as $val) 
                <div class="alert alert-info d-inline-block"> 
                {{ $val }} 
                </div>
                @endforeach 
                </div>

                <div class="container text-center mt-3 pt-3 bg-white"> 
                    <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{$nama}}</h1> 
                    <br> 
                    @foreach ($nilai as $val) 
                    @if (($val >= 0) and ($val < 50)) 
                    <div class="alert alert-danger d-inline-block"> {{$val}} 

                    </div> 
                    @elseif (($val >= 50) and ($val <= 100)) 
                    <div class="alert alert-success d-inline-block"> 
                        {{Sval}} 
                    </div> 
                    @endif 
                    @endforeach 
                    </div>

                    <div class="container text-center mt-3 pt-3 bg-white"> 
                    <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{$nama}}</h1> 
                    <br> 
                    @forelse ($nilai as $val) 
                    <div class="alert alert-danger d-inline-block"> 
                    @if (($val >= 0) and ($val < 50)) {{$val}} 
                    </div> @elseif (($val >= 50) and ($val <= 100)) 
                    <div class="alert alert-success d-inline-block"> 
                    {{$val}}
                    </div> 
                    @endif 
                    @empty 
                    <div class="alert alert-dark d-inline-block">Tidak ada data...</div> 
                    @endforelse 
                    </div>

                    <div class="container text-center mt-3 pt-3 bg-white"> 
                    <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{$nama}}</h1> 
                    <br> @foreach ($nilai as $val) 
                    @if ($val < 50) 
                    @continue 
                    @endif 
                    <div class="alert alert-success d-inline-block"> 
                        {{Sval}} </div> 
                        @endforeach 
                    </div>

                    <div class="container text-center mt-3 pt-3 bg-white"> 
                    <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{$nama}}</h1> mahasiswa.blade.php 
                    <br> 
                    @foreach ($nilai as $val) 
                    @if ($val < 50)
                    @break 
                    @endif 
                    <div class="alert alert-success d-inline-block"> 
                        {{$val}}
                     </div> 
                     @endforeach 
                    </div>

                    <div class="container text-center mt-3 pt-3 bg-white"> 
                        <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{$nama}}</h1>
                        <br> 
                        {{--
                        @foreach ($nilai as $val) 
                        @if ($val < 50) 
                        @break 
                        @endif
                        <div class="alert alert-success d-inline-block"> 
                            {{$val}} 
                        </div> 
                            @endforeach
                            --}}
                        </div>