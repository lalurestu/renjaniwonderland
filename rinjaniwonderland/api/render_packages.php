<?php
declare(strict_types=1);

function load_packages(): array {
  $DATA_FILE = __DIR__ . '/../data/packages.json';
  if (!file_exists($DATA_FILE)) return [];
  $raw = file_get_contents($DATA_FILE);
  $db = json_decode($raw ?: '{"packages": []}', true);
  return (is_array($db) && isset($db['packages']) && is_array($db['packages'])) ? $db['packages'] : [];
}

function render_cards(array $pkgs): string {
  $html = '<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:16px">';
  foreach ($pkgs as $p) {
    $title = htmlspecialchars($p['title'] ?? '');
    $img = htmlspecialchars($p['image_url'] ?? '');
    $price = number_format((float)($p['price'] ?? 0), 0, ',', '.');
    $duration = htmlspecialchars($p['duration'] ?? '');
    $difficulty = htmlspecialchars($p['difficulty'] ?? '');
    $desc = htmlspecialchars($p['short_desc'] ?? '');
    $html .= <<<CARD
      <article style="border:1px solid #1f3a40;border-radius:14px;background:#113039;overflow:hidden">
        <div style="aspect-ratio:16/10;background:#0b1d21"><img src="$img" alt="" style="width:100%;height:100%;object-fit:cover"></div>
        <div style="padding:12px 14px">
          <h3 style="margin:0 0 6px 0">$title</h3>
          <div style="font-size:12px;opacity:.85;margin-bottom:8px">$desc</div>
          <div style="display:flex;justify-content:space-between;font-size:12px;opacity:.9;margin-bottom:10px">
            <span>$duration</span><span>$difficulty</span>
          </div>
          <div style="font-weight:700">IDR $price</div>
        </div>
      </article>
CARD;
  }
  $html .= '</div>';
  return $html;
}
