<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return response()->json(Game::all());
    }

    // Chama o script Python para gerar os placares
    private function generateScore()
    {
        $scriptPath = base_path('teste.py'); // Obtém o caminho correto do script Python
        $scriptPath = escapeshellarg($scriptPath); // Evita problemas com espaços

        // Executar o script e capturar a saída (redirecionando erro para saída padrão)
        $output = shell_exec("python $scriptPath 2>&1");

        // Testa com python3 caso o primeiro falhe
        if (!$output) {
            $output = shell_exec("python3 $scriptPath 2>&1");
        }

        // Remover espaços e quebras de linha
        $lines = explode("\n", trim($output)); 
        $output = end($lines); // Pega apenas a última linha da saída

        // Loga para verificar o que foi retornado
        error_log("Saída do Python: " . json_encode($output));

        // Se estiver vazio ou não for um número válido, lança erro
        if ($output === "" || !is_numeric($output)) {
            throw new \Exception("Erro: O script Python não retornou um número válido! Saída: " . json_encode($output));
        }

        return (int) $output;
    }

    // Implementa a lógica de desempate
    private function determineWinner($teamA, $teamB)
    {
        if ($teamA->score > $teamB->score) {
            return $teamA->id;
        } elseif ($teamB->score > $teamA->score) {
            return $teamB->id;
        } else {
            // Se empatar, vence quem foi cadastrado primeiro
            return ($teamA->id < $teamB->id) ? $teamA->id : $teamB->id;
        }
    }

    public function store(Request $request)
    {
        $teamA = Team::find($request->team_a_id);
        $teamB = Team::find($request->team_b_id);

        if (!$teamA || !$teamB) {
            return response()->json(['error' => 'Times inválidos!'], 400);
        }

        // Gerar placares com o script Python
        $scoreA = $this->generateScore();
        $scoreB = $this->generateScore();

        // Log para depuração
        error_log("Placar gerado: Team A ({$teamA->id}) {$scoreA} x {$scoreB} Team B ({$teamB->id})");

        // Criar o jogo no banco
        $game = Game::create([
            'team_a_id' => $teamA->id,
            'team_b_id' => $teamB->id,
            'championship_id' => $request->championship_id,
            'score_team_a' => $scoreA,
            'score_team_b' => $scoreB
        ]);

        // Determinar o vencedor
        $winner = $this->determineWinner($teamA, $teamB);

        return response()->json([
            'game' => $game,
            'winner' => $winner
        ], 201);
    }

    public function show(Game $game)
    {
        return response()->json($game);
    }

    public function update(Request $request, Game $game)
    {
        $game->update($request->all());
        return response()->json($game);
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return response()->json(null, 204);
    }
}
