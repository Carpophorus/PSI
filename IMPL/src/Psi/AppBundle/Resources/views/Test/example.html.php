<?php $view->extend('PsiAppBundle:layout:base.html.php') ?>

<?php $view['UI']->start('_content'); ?>
<a href="<?php echo $router->generate("user_login_action"); ?>">Login</a>
<button onclick="window.location = '<?php echo $router->generate('user_login_action') ?>';">Click me</button>

<?php $summonerName = "Stefan"; ?>
<?php $players = []; ?>
<?php
$runes = [
    0 => "+15 damage",
    1 => "+3% attack speed"
];

$redPlayers = [
    'Marko' => [
        'id' => 123,
        'summoner' => 'mark',
        'runes' => $runes
    ],
    'Stefan' => [
        'id' => 431,
        'summoner' => 'stef',
        'runes' => $runes
    ]
];

$teams = [
    'red' => [
        'code' => 'red',
        'name' => 'AwesomeTeam',
        'players' => $redPlayers
    ],
    'blue' => [
        'code' => 'blue',
        'name' => "N2M",
        'players' => [
            'Viktor' => [
                'id' => 5454,
                'summoner' => 'vik',
                'runes' => $runes
            ],
            'Nemanja' => [
                'id' => 6772,
                'summoner' => 'neca',
                'runes' => $runes
            ]
        ]
    ]
];

?>
<?php
$players[0] = [
    'name' => "Nemanja",
    'id' => 12345,
    'summoner' => 'neca'
];

?>
<?php
$players[1] = [
    'name' => "Vik",
    'id' => 143,
    'summoner' => 'vic'
];

?>

<?php
$match = [
    'date' => date('Y-m-d'),
    'winner' => "Blue",
    'duration' => "30:25"
    ]

?>

<h1>Tvoj summoner name je <?php echo $summonerName; ?></h1>

Informacije o mecu:
<div class="teams-container">
    <div class="col-sm-6">
        <?php $team = $teams['red']; ?>
        <div class="player-container">
            <?php foreach ($team['players'] as $player): ?>
                <div class="player-item" data-summoner="<?php echo $player['summoner']; ?>" data-id="<?php echo $player['id']; ?>">
                    <div><?php echo $player['summoner']; ?></div>
                    <pre><?php var_dump($player['runes']); ?></pre>
                    <button onclick="showRunes(this);">Show runes</button>
                </div>
            <?php endforeach; ?>
        </div>            
    </div>
    <div class="col-sm-6">
        <?php $team = $teams['blue']; ?>
        <div class="player-container">
            <?php foreach ($team['players'] as $player): ?>
                <div class="player-item" data-summoner="<?php echo $player['summoner']; ?>" data-id="<?php echo $player['id']; ?>">
                    <div><?php echo $player['summoner']; ?></div>
                    <pre><?php var_dump($player['runes']); ?></pre>
                    <button onclick="showRunes(this);">Show runes</button>
                </div>
            <?php endforeach; ?>
        </div>            
    </div>    
</div>



Informacije o mecu:
<span>Duzina: <?php echo $match['duration']; ?></span>
<span>Pobednik: <?php echo $match['winner']; ?></span>

<?php $view['UI']->stop() ?>