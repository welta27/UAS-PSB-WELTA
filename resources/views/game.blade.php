<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/game.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mini Games</title>
</head>

<body>
    <form action="/logout" class="position-absolute top-0 end-0">
        @csrf
        <button type="submit" id="logout" class="btn btn-lg btn-primary">Logout</button>
    </form>
    <div id="app">
        <div class="summary">
            <h1 class="title">MATCH RESULT</h1>
            <br />
            <h1 id="inGame"></h1>
            <h3 id="result"></h3>
        </div>
        <div class="games">
            <div class="option" onclick="pickOption('🖐')">🖐</div>
            <div class="option" onclick="pickOption('✌')">✌</div>
            <div class="option" onclick="pickOption('✊')">✊</div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ $message }}",
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    @endif

    <script>
        class Start {
            constructor() {
                this.playerName = "Player"
                this.botName = "Bot"
                this.playerOption;
                this.botOption;
                this.winner = ""
            }

            get getBotOption() {
                return this.botOption;
            }

            set setBotOption(option) {
                this.botOption = option;
            }

            get getPlayerOption() {
                return this.playerOption
            }

            set setPlayerOption(option) {
                this.playerOption = option;
            }

            botBrain() {
                const option = ["🖐", "✌", "✊"];
                const bot = option[Math.floor(Math.random() * option.length)];
                return bot;
            }

            winCalculation() {
                if (this.botOption == "🖐" && this.playerOption == "✌") {
                    return this.winner = this.playerName
                } else if (this.botOption == "🖐" && this.playerOption == "✊") {
                    return this.winner = this.botName;
                } else if (this.botOption == "✌" && this.playerOption == "🖐") {
                    return this.winner = this.botName;
                } else if (this.botOption == "✌" && this.playerOption == "✊") {
                    return this.winner = this.playerName
                } else if (this.botOption == "✊" && this.playerOption == "🖐") {
                    return this.winner = this.playerName
                } else if (this.botOption == "✊" && this.playerOption == "✌") {
                    return this.winner = this.botName;
                } else {
                    return this.winner = "SERI"
                }
            }

            matchResult() {
                if (this.winner != "SERI") {
                    return `${this.winner} MENANG!`;
                } else {
                    return `WAAA ${this.winner}, GAK ADA YG MENANG 🤪`;
                }
            }
        }

        function pickOption(params) {
            const start = new Start();
            start.setPlayerOption = params;
            start.setBotOption = start.botBrain();
            start.winCalculation();

            const inGame = document.getElementById("inGame");
            const result = document.getElementById("result");

            inGame.textContent = "..."
            result.textContent = "..."

            setTimeout(() => {
                inGame.textContent = `${start.getPlayerOption} VS ${start.getBotOption}`
                result.textContent = start.matchResult();
            }, 1500);

        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
