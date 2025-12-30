<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game->title }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        h1 {
            text-align: center;
            color: #667eea;
            margin-bottom: 10px;
            font-size: 2.5rem;
        }
        .description {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }
        .matching-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin: 30px 0;
        }
        .column {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .column h2 {
            text-align: center;
            color: #667eea;
            margin-bottom: 10px;
        }
        .item {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 20px;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            position: relative;
        }
        .item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }
        .item.selected {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 0 0 3px #ffd700;
        }
        .item.correct {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            animation: bounce 0.5s;
        }
        .item.wrong {
            background: linear-gradient(135deg, #ee0979 0%, #ff6a00 100%);
            animation: shake 0.5s;
        }
        .item img {
            max-width: 100px;
            max-height: 100px;
            margin: 10px auto;
            display: block;
            border-radius: 10px;
        }
        .score-board {
            text-align: center;
            margin: 20px 0;
            font-size: 1.5rem;
            color: #667eea;
            font-weight: bold;
        }
        .finish-btn {
            display: block;
            margin: 30px auto;
            padding: 15px 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        .finish-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $game->title }}</h1>
        <p class="description">{{ $game->description }}</p>
        
        <div class="score-board">
            Skor: <span id="score">0</span> / <span id="total">{{ $questions->sum('points') }}</span>
        </div>

        <div class="matching-container">
            <div class="column">
                <h2>Kolom Kiri</h2>
                @foreach($questions as $question)
                    <div class="item left-item" data-id="{{ $question->id }}" data-answer="{{ $question->answer_text }}">
                        @if($question->image_path)
                            <img src="{{ asset($question->image_path) }}" alt="{{ $question->question_text }}">
                        @endif
                        {{ $question->question_text }}
                    </div>
                @endforeach
            </div>

            <div class="column">
                <h2>Kolom Kanan</h2>
                @foreach($questions->shuffle() as $question)
                    <div class="item right-item" data-answer="{{ $question->answer_text }}" data-points="{{ $question->points }}">
                        {{ $question->answer_text }}
                    </div>
                @endforeach
            </div>
        </div>

        <button class="finish-btn" onclick="finishGame()">Selesai</button>
    </div>

    <script>
        let selectedLeft = null;
        let score = 0;
        let matchedPairs = 0;
        const totalPairs = {{ $questions->count() }};

        // Shuffle right column on load
        const rightColumn = document.querySelector('.column:last-child');
        const rightItems = Array.from(rightColumn.querySelectorAll('.right-item'));
        rightItems.sort(() => Math.random() - 0.5);
        rightItems.forEach(item => rightColumn.appendChild(item));

        document.querySelectorAll('.left-item').forEach(item => {
            item.addEventListener('click', function() {
                if (this.classList.contains('correct')) return;
                
                document.querySelectorAll('.left-item').forEach(i => i.classList.remove('selected'));
                this.classList.add('selected');
                selectedLeft = this;
            });
        });

        document.querySelectorAll('.right-item').forEach(item => {
            item.addEventListener('click', function() {
                if (this.classList.contains('correct')) return;
                if (!selectedLeft) {
                    alert('Pilih item dari kolom kiri terlebih dahulu!');
                    return;
                }

                const leftAnswer = selectedLeft.dataset.answer;
                const rightAnswer = this.dataset.answer;

                if (leftAnswer === rightAnswer) {
                    // Correct match
                    selectedLeft.classList.add('correct');
                    selectedLeft.classList.remove('selected');
                    this.classList.add('correct');
                    
                    const points = parseInt(this.dataset.points);
                    score += points;
                    matchedPairs++;
                    
                    document.getElementById('score').textContent = score;
                    
                    selectedLeft = null;

                    if (matchedPairs === totalPairs) {
                        setTimeout(() => {
                            alert('Selamat! Anda berhasil mencocokkan semua pasangan!');
                        }, 500);
                    }
                } else {
                    // Wrong match
                    selectedLeft.classList.add('wrong');
                    this.classList.add('wrong');
                    
                    setTimeout(() => {
                        selectedLeft.classList.remove('wrong', 'selected');
                        this.classList.remove('wrong');
                        selectedLeft = null;
                    }, 500);
                }
            });
        });

        function finishGame() {
            // Submit score to backend
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("games.submit") }}';
            
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}';
            
            const scoreInput = document.createElement('input');
            scoreInput.type = 'hidden';
            scoreInput.name = 'score';
            scoreInput.value = score;
            
            const totalInput = document.createElement('input');
            totalInput.type = 'hidden';
            totalInput.name = 'total_score';
            totalInput.value = {{ $questions->sum('points') }};
            
            form.appendChild(csrfInput);
            form.appendChild(scoreInput);
            form.appendChild(totalInput);
            
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>
