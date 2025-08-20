
const qs=(s,r=document)=>r.querySelector(s);
const qsa=(s,r=document)=>Array.from(r.querySelectorAll(s));
const readFileAsDataURL=(file)=>new Promise(res=>{const fr=new FileReader(); fr.onload=()=>res(fr.result); fr.readAsDataURL(file)});
const fmtTime=(d)=>{const p=n=>String(n).padStart(2,'0'); return `${d.getFullYear()}-${p(d.getMonth()+1)}-${p(d.getDate())} ${p(d.getHours())}:${p(d.getMinutes())}:${p(d.getSeconds())}`};

(function(){
  const list = JSON.parse(localStorage.getItem('candidates')||'[]');
  if(list.length===0){
    const seed=[
      {id:crypto.randomUUID(),name:'Candidate A',email:'a@example.com',phone:'+62 812-1111-111',desc:'Experienced leader with a clear vision.',photo:''},
      {id:crypto.randomUUID(),name:'Candidate B',email:'b@example.com',phone:'+62 812-2222-222',desc:'Community-driven and collaborative.',photo:''},
      {id:crypto.randomUUID(),name:'Candidate C',email:'c@example.com',phone:'+62 812-3333-333',desc:'Innovator & problem solver.',photo:''}
    ];
    localStorage.setItem('candidates', JSON.stringify(seed));
  }
})();

function getUser(){ try{return JSON.parse(localStorage.getItem('loggedInUser')||'null')}catch(_){return null} }
function logout(){ localStorage.removeItem('loggedInUser'); }
function hasUserVoted(email){ return email ? localStorage.getItem('hasVoted:'+email)==='true' : false; }
function setUserVoted(email, v=true){ if(email) localStorage.setItem('hasVoted:'+email, v?'true':'false'); }
function requireUser(){ if(!getUser()) location.href='login.html'; }
function requireAdmin(){ const u=getUser(); if(!u || u.role!=='admin') location.href='login.html'; }
function checkAdminLink(){
  const u=getUser();
  const el=qs('#adminLink');
  const resultLink=qs('#resultsLinkAdmin');
  if(u?.role==='admin'){ el?.classList.remove('d-none'); resultLink?.classList.remove('d-none'); }
  else { el?.classList.add('d-none'); resultLink?.classList.add('d-none'); }
}

function initVotingPage(){
  requireUser();
  const u=getUser();
  checkAdminLink();
  if(hasUserVoted(u?.email)){ alert('Anda sudah melakukan voting. Menampilkan hasil voting.'); location.href='results.html'; return; }

  const wrap=qs('#votingGrid');
  const list=JSON.parse(localStorage.getItem('candidates')||'[]');
  wrap.innerHTML='';
  list.forEach(c=>{
    const col=document.createElement('div'); col.className='col-md-4 mb-4';
    col.innerHTML = `
    <div class="card shadow-soft h-100">
      <img src="${c.photo||'https://via.placeholder.com/600x300'}" class="card-img-top" style="height:190px;object-fit:cover;" alt="">
      <div class="card-body d-flex flex-column">
        <h5 class="card-title">${c.name}</h5>
        <p class="text-muted flex-grow-1">${c.desc||''}</p>
        <button class="btn btn-primary mt-2" data-id="${c.id}">Vote</button>
      </div>
    </div>`;
    wrap.appendChild(col);
  });
  wrap.addEventListener('click',(e)=>{
    if(e.target.matches('button[data-id]')){
      const id=e.target.getAttribute('data-id');
      const votes=JSON.parse(localStorage.getItem('votes')||'{}'); votes[id]=(votes[id]||0)+1;
      localStorage.setItem('votes', JSON.stringify(votes));
      setUserVoted(u?.email,true);

      const cand=(JSON.parse(localStorage.getItem('candidates')||'[]')).find(x=>x.id===id);
      const log=JSON.parse(localStorage.getItem('voteLog')||'[]');
      log.push({userName:u?.name||'User', userEmail:u?.email||'', candidateId:id, candidateName:cand?.name||'Unknown', timestamp:fmtTime(new Date())});
      localStorage.setItem('voteLog', JSON.stringify(log));

      location.href='vote-success.html';
    }
  });
}

function initManagePage(){
  requireAdmin();
  const tbody=qs('#candRows'); const search=qs('#searchInput');
  function render(){
    const list=JSON.parse(localStorage.getItem('candidates')||'[]');
    const q=(search.value||'').toLowerCase();
    tbody.innerHTML='';
    list.filter(c=>[c.name,c.email,c.phone,c.desc].join(' ').toLowerCase().includes(q)).forEach(c=>{
      const tr=document.createElement('tr');
      tr.innerHTML=`
        <td style="width:64px"><img src="${c.photo||'https://via.placeholder.com/80'}" class="avatar-sm"></td>
        <td>${c.name}</td><td>${c.email||'-'}</td><td>${c.phone||'-'}</td><td>${c.desc||'-'}</td>
        <td class="text-end">
          <a class="btn btn-sm btn-outline-primary me-2" href="edit-candidate.html?id=${c.id}">Edit</a>
          <button class="btn btn-sm btn-outline-danger" data-id="${c.id}">Delete</button>
        </td>`;
      tbody.appendChild(tr);
    });
  }
  render();
  search.addEventListener('input',render);
  tbody.addEventListener('click',(e)=>{
    if(e.target.matches('button[data-id]')){
      const id=e.target.getAttribute('data-id');
      if(confirm('Delete this candidate?')){
        const left=JSON.parse(localStorage.getItem('candidates')||'[]').filter(x=>x.id!==id);
        localStorage.setItem('candidates', JSON.stringify(left));
        render();
      }
    }
  });
}

function initAddPage(){
  requireAdmin();
  const form=qs('#addForm'); const file=qs('#photo'); const drop=qs('#dropzone');
  let photoData='';
  function setDrag(on){ drop.classList.toggle('dragover',!!on); }
  ;['dragenter','dragover'].forEach(ev=> drop.addEventListener(ev,e=>{e.preventDefault();setDrag(true);}));
  ;['dragleave','drop'].forEach(ev=> drop.addEventListener(ev,e=>{e.preventDefault();setDrag(false);}));
  drop.addEventListener('drop',async e=>{ const f=e.dataTransfer.files?.[0]; if(!f)return; photoData=await readFileAsDataURL(f); drop.innerHTML='<img class="avatar-md" src="'+photoData+'">'; });
  file.addEventListener('change',async e=>{ const f=e.target.files?.[0]; if(!f)return; photoData=await readFileAsDataURL(f); drop.innerHTML='<img class="avatar-md" src="'+photoData+'">'; });
  form.addEventListener('submit',e=>{
    e.preventDefault();
    const c=Object.fromEntries(new FormData(form).entries());
    const item={id:crypto.randomUUID(), name:c.name, email:c.email, phone:c.phone, desc:c.desc, photo:photoData};
    const list=JSON.parse(localStorage.getItem('candidates')||'[]'); list.push(item);
    localStorage.setItem('candidates', JSON.stringify(list));
    alert('Candidate added.');
    location.href='admin-manage.html';
  });
}

function initEditPage(){
  requireAdmin();
  const list=JSON.parse(localStorage.getItem('candidates')||'[]');
  const ul=qs('#candidateList'); ul.innerHTML='';
  list.forEach(c=>{
    const a=document.createElement('a');
    a.href='edit-candidate.html?id='+c.id; a.className='list-group-item list-group-item-action d-flex align-items-center gap-3';
    a.innerHTML=`<img class="avatar-sm" src="${c.photo||'https://via.placeholder.com/80'}"><div><div class="fw-semibold">${c.name}</div><small class="text-muted">${c.desc||''}</small></div>`;
    ul.appendChild(a);
  });
  const params=new URLSearchParams(location.search); const id=params.get('id') || (list[0]?.id||null);
  if(!id){ alert('No candidate yet. Please add.'); location.href='add-candidate.html'; return; }
  const cand=list.find(x=>x.id===id);
  const form=qs('#editForm'); const name=qs('#name'), email=qs('#email'), phone=qs('#phone'), desc=qs('#desc');
  const photoPrev=qs('#photoPrev'), photoInput=qs('#photoInput');
  let photoData=cand?.photo||'';
  function populate(){ name.value=cand?.name||''; email.value=cand?.email||''; phone.value=cand?.phone||''; desc.value=cand?.desc||''; photoPrev.src=cand?.photo||'https://via.placeholder.com/120'; }
  populate();
  photoInput.addEventListener('change',async e=>{ const f=e.target.files?.[0]; if(!f)return; photoData=await readFileAsDataURL(f); photoPrev.src=photoData; });
  form.addEventListener('submit',e=>{
    e.preventDefault();
    const idx=list.findIndex(x=>x.id===cand.id);
    list[idx]={...list[idx], name:name.value, email:email.value, phone:phone.value, desc:desc.value, photo:photoData};
    localStorage.setItem('candidates', JSON.stringify(list));
    alert('Saved.');
    location.href='admin-manage.html';
  });
  qs('#btnDelete').addEventListener('click',()=>{
    if(confirm('Delete this candidate?')){
      const left=list.filter(x=>x.id!==cand.id);
      localStorage.setItem('candidates', JSON.stringify(left));
      location.href='admin-manage.html';
    }
  });
}

function initResultsPage(){
  const cand=JSON.parse(localStorage.getItem('candidates')||'[]');
  const votes=JSON.parse(localStorage.getItem('votes')||'{}');
  const labels=cand.map(c=>c.name);
  const counts=cand.map(c=>votes[c.id]||0);
  const total=counts.reduce((a,b)=>a+b,0);
  const eligible=parseInt(localStorage.getItem('eligibleVoters')||0);
  const perc=counts.map(v=> total>0 ? Math.round((v/total)*100) : 0);
  const golput= eligible>0 ? Math.max(0, Math.round(((eligible-total)/eligible)*100)) : 0;

  const ctx=document.getElementById('resultsChart');
  if(ctx && window.Chart){
    new Chart(ctx,{ type:'bar', data:{ labels, datasets:[{ label:'% Votes', data:perc, borderRadius:8 }]},
      options:{ responsive:true, scales:{ y:{ beginAtZero:true, max:100, ticks:{ callback:(v)=>v+'%' }}}} });
  }

  const tb=qs('#resultsBody'); if(tb){ tb.innerHTML='';
    labels.forEach((nm,i)=>{
      const tr=document.createElement('tr');
      tr.innerHTML=`<td>${nm}</td><td class="text-end">${counts[i]}</td><td class="text-end">${perc[i]}%</td><td class="text-end">${golput}%</td>`;
      tb.appendChild(tr);
    });
  }

  const logWrap=qs('#voteLogBody');
  const log=JSON.parse(localStorage.getItem('voteLog')||'[]');
  if(logWrap){
    logWrap.innerHTML='';
    log.slice().reverse().forEach(item=>{
      const tr=document.createElement('tr');
      tr.innerHTML=`<td>${item.timestamp}</td><td>${item.userName} <small class="text-muted">${item.userEmail||''}</small></td><td>${item.candidateName}</td>`;
      logWrap.appendChild(tr);
    });
  }

  const btn=qs('#btnExport');
  btn?.addEventListener('click', async ()=>{
    const { jsPDF } = window.jspdf;
    const chartCanvas = document.getElementById('resultsChart');
    const tableEl = document.querySelector('.table-results');
    const canvasImg = chartCanvas.toDataURL('imagePNG', 1.0);
    const pdf = new jsPDF('l','pt','a4');
    pdf.setFontSize(16);
    pdf.text('Voting Results Report', 40, 40);
    pdf.addImage(canvasImg, 'PNG', 40, 60, 520, 280);
    const tableCanvas = await html2canvas(tableEl);
    const tableImg = tableCanvas.toDataURL('imagePNG', 1.0);
    pdf.addImage(tableImg, 'PNG', 580, 60, 520, 280);
    pdf.save('voting-results.pdf');
  });
  document.querySelector('#btnResetVotes')?.addEventListener('click',()=>{
    if(confirm('Reset all votes?')){
      localStorage.removeItem('votes');
      localStorage.removeItem('voteLog');
      location.reload();
    }
  });
}

document.addEventListener('DOMContentLoaded', ()=>{
  const page=document.body.dataset.page;
  if(page==='voting') initVotingPage();
  if(page==='manage') initManagePage();
  if(page==='add') initAddPage();
  if(page==='edit') initEditPage();
  if(page==='results') initResultsPage();
});
