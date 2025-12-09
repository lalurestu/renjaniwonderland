<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sembalun – Wildlife Photography</title>
<link rel="stylesheet" href="css/wild.css">
</head>
<body>
    <div class="navbar">
        <nav>
            <img src="img/logo.png" alt="">
            <div class="bar">
                <li>
                    <a href="index.php">Homepage</a>
                    <a href="mount.php">Mt Rinjani</a>
                    <a href="hills.php">Hills</a>
                    <a href="paragliding.php">Paragliding</a>
                    <a href="about.php">About Us</a>
                    <a href="#help">Help</a>
                    <div class="dropdown">
                    <button class="dropbtn">Package
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                      <a href="mount-pack.php">Mount Package</a>
                      <a href="hills-pack.php">Hills Package</a>
                      <a href="paragliding-pack.php">Paragliding Package</a>
                    </div>
                    </div>
                    <div class="dropdown">
                    <button class="dropbtn">Photography
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                      <a href="wild-photo.php">Wildlife Photography</a>
                      <a href="human-photo.php">Human Interest Photography</a>
                    </div>
                    </div>
                </li>
            </div>
        </nav>
    </div>

    <section id="about1" class="about1">
        <div class="about-me1">
            <h1>About Us</h1>
        </div>
        <p>enjoy the charm of its iconic hills, and soar freely through the skies with paragliding over breathtaking valleys.</p>
    </section>
  <div class="wrap">


    <section class="section intro" aria-label="Introduction & Description">
      <h3>Introduction & Description</h3>
      <h1 class="titleBig">Explore The Sembalun Ecosystem</h1>
      <p class="lead">Sembalun in East Lombok is gateway to Mount Rinjani. It is a sanctuary for a diverse range of unique endemic species. Our photography tours provide exclusive access to these habitats, guided by local experts who know the land and its wild inhabitants intimately.</p>

      <div class="features" aria-label="Why choose us">
        <div class="feat">"+iconGuide()+"<div><strong>Expert Local Guide</strong><br/><span style="color:var(--ink-2)">Certified mountain & wildlife specialists with years of field experience.</span></div></div>
        <div class="feat">"+iconAccess()+"<div><strong>Access to Wild Habitats</strong><br/><span style="color:var(--ink-2)">Go off-road to hidden valleys and forest edges safely.</span></div></div>
        <div class="feat">"+iconPhoto()+"<div><strong>Pro Photography Tips</strong><br/><span style="color:var(--ink-2)">We help you master light, composition, and ethics.</span></div></div>
      </div>
    </section>


    <section class="section" aria-label="Gallery of Sembalun's Endemic Wildlife">
      <h2>Gallery of Sembalun's Endemic Wildlife</h2>
      <p class="lead">Beyond the towering peaks, a rich tapestry of life flourishes. Explore our curated selection of endemic birds, mammals, and insects, each a testament to Sembalun's unrivaled natural beauty.</p>
      <div class="scroller">
        <div class="row" id="wildRow"></div>
      </div>
    </section>


    <section class="section" aria-label="Choose Your Wildlife Photography Adventure">
      <h2>Choose Your Wildlife Photography Adventure</h2>
      <div class="plans" id="plans"></div>
    </section>


    <section class="section" aria-label="Gallery Wild Photography">
      <h2>Gallery Wild Photography</h2>
      <div class="photoGrid" id="photoGrid"></div>
    </section>

  </div>


  <template id="tpl-wild">
    <article class="card">
      <img alt="" />
      <div class="cap" data-cap></div>
    </article>
  </template>

  <template id="tpl-plan">
    <article class="plan">
      <div class="icon" data-icon></div>
      <div>
        <h3 data-title></h3>
        <p class="lead" data-desc></p>
        <div class="meta">
          <span class="badge" data-diff></span>
          <span class="badge" data-duration></span>
          <span class="badge" data-distance></span>
          <span class="badge" data-group></span>
        </div>
      </div>
      <div class="bars">
        <div class="bar" title="Wildlife Chance"><span style="width:70%"></span></div>
        <div class="bar" title="Scenery Score"><span style="width:85%"></span></div>
        <div class="bar" title="Fitness Required"><span style="width:40%"></span></div>
        <button class="cta" type="button">Book This Plan</button>
      </div>
    </article>
  </template>

  <template id="tpl-photo">
    <figure class="ph"><img alt="" /></figure>
  </template>

  <script>

    const endemic = [
      {cap:'Monkey Forest', img:'https://images.unsplash.com/photo-1555685812-4b943f1cb0eb?q=80&w=1600&auto=format&fit=crop'},
      {cap:'Birds', img:'https://images.unsplash.com/photo-1470115636492-6d2b56f9146e?q=80&w=1600&auto=format&fit=crop'},
      {cap:'Birds', img:'https://images.unsplash.com/photo-1546182990-dffeafbe841d?q=80&w=1600&auto=format&fit=crop'},
      {cap:'Butterflies', img:'https://images.unsplash.com/photo-1508186225823-0963cf9ab0de?q=80&w=1600&auto=format&fit=crop'}
    ];

    const plans = [
      {
        title:'Easy: Village & Savannah Stroll',
        desc:'Gentle walk through rice fields and savannah edges. Morning light, perfect for birds and macro.',
        diff:'Easy', duration:'2–3 hrs', distance:'2–4 km', group:'Max 8',
        icon: iconEasy(), bars:[70,70,20]
      },
      {
        title:'Medium: Forest Edge & Lower Slopes',
        desc:'Mixed terrain: forest edge, streams, and hill viewpoints. Great chance for raptors and macaques.',
        diff:'Medium', duration:'4–6 hrs', distance:'6–10 km', group:'Max 6',
        icon: iconMedium(), bars:[80,85,50]
      },
      {
        title:'Hard: Deep Jungle & High Altitude',
        desc:'Challenging full-day trek with steep sections. Reward: rare birds, waterfalls, and dramatic ridgelines.',
        diff:'Hard', duration:'8–10 hrs', distance:'12–16 km', group:'Max 4',
        icon: iconHard(), bars:[90,95,80]
      }
    ];

    const photos = [
      'https://images.unsplash.com/photo-1516375195448-0b5455d43e4a?q=80&w=1600&auto=format&fit=crop',
      'https://images.unsplash.com/photo-1602524817640-43f92f1103cc?q=80&w=1600&auto=format&fit=crop',
      'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?q=80&w=1600&auto=format&fit=crop',
      'https://images.unsplash.com/photo-1592194996308-7b43878e84a6?q=80&w=1600&auto=format&fit=crop'
    ];


    const wildRow = document.getElementById('wildRow');
    const plansBox = document.getElementById('plans');
    const grid = document.getElementById('photoGrid');

    const tplWild = document.getElementById('tpl-wild');
    const tplPlan = document.getElementById('tpl-plan');
    const tplPhoto = document.getElementById('tpl-photo');

    endemic.forEach(item=>{
      const node = tplWild.content.cloneNode(true);
      node.querySelector('img').src = item.img;
      node.querySelector('img').alt = item.cap;
      node.querySelector('[data-cap]').textContent = item.cap;
      wildRow.appendChild(node);
    });

    plans.forEach(p=>{
      const node = tplPlan.content.cloneNode(true);
      node.querySelector('[data-title]').textContent = p.title;
      node.querySelector('[data-desc]').textContent = p.desc;
      node.querySelector('[data-diff]').textContent = p.diff;
      node.querySelector('[data-duration]').textContent = p.duration;
      node.querySelector('[data-distance]').textContent = p.distance;
      node.querySelector('[data-group]').textContent = p.group;
      node.querySelector('[data-icon]').innerHTML = p.icon;
      const bars = node.querySelectorAll('.bar>span');
      (p.bars||[]).forEach((v,i)=>{if(bars[i]) bars[i].style.width = v+'%'});
      plansBox.appendChild(node);
    });

    photos.forEach(src=>{
      const node = tplPhoto.content.cloneNode(true);
      node.querySelector('img').src = src; node.querySelector('img').alt = 'Wildlife photo';
      grid.appendChild(node);
    });


    function iconGuide(){return `<svg width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2 3 7v10l9 5 9-5V7l-9-5Z" stroke="${'#eaf8f4'}" stroke-width="2"/><path d="M12 8v8m-4-4h8" stroke="${'#eaf8f4'}" stroke-width="2" stroke-linecap="round"/></svg>`}
    function iconAccess(){return `<svg width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="7" cy="7" r="3" stroke="${'#eaf8f4'}" stroke-width="2"/><circle cx="17" cy="17" r="3" stroke="${'#eaf8f4'}" stroke-width="2"/><path d="M10 7h3a5 5 0 0 1 5 5v3" stroke="${'#eaf8f4'}" stroke-width="2" stroke-linecap="round"/></svg>`}
    function iconPhoto(){return `<svg width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="3" y="5" width="18" height="14" rx="2" stroke="${'#eaf8f4'}" stroke-width="2"/><circle cx="8" cy="10" r="1.5" fill="${'#eaf8f4'}"/><path d="M3 16l5-5 4 4 3-3 6 6" stroke="${'#eaf8f4'}" stroke-width="2" stroke-linecap="round"/></svg>`}
    function iconEasy(){return `<svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 20h18" stroke="#0f4351" stroke-width="2"/><path d="M4 18l4-6 4 3 3-5 5 8" stroke="#0f4351" stroke-width="2" stroke-linecap="round"/></svg>`}
    function iconMedium(){return `<svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 20h18" stroke="#0f4351" stroke-width="2"/><path d="M4 18l5-8 4 4 3-6 4 10" stroke="#0f4351" stroke-width="2" stroke-linecap="round"/></svg>`}
    function iconHard(){return `<svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 20h18" stroke="#0f4351" stroke-width="2"/><path d="M4 18l5-9 3 2 4-8 4 15" stroke="#0f4351" stroke-width="2" stroke-linecap="round"/></svg>`}
  
    var navLinks = document.getElementById("navLinks");
    function showMenu() { navLinks.style.right = "0"; }
    function hideMenu() { navLinks.style.right = "-250px"; }
  </script>
</body>
</html>
