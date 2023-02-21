@extends('BASE.base')
@section('viewcosts')
<style>
    .price-header {
        color:white !important;
        font-size: 20px;
    }

</style>
    <br><br>
    <div class="container text-center">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="d-md-inline">
                <br><br>
                <h2> Item Costs </h2>
                <br><br>
                
                <div class="card-body">
                    <br><br>
                    <style type="text/css">
                        .pagination {
                            text-align:center;
                        }
                        #tg-dDTF2 {
                            table-layout:fixed;
                        }
                        .ulist li {
                            display:inline-block;
                        }
                        .tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
                        .tg td{font-family:Arial, sans-serif;font-size:14px;
                        overflow:hidden;padding:10px 5px;word-break:normal;}
                        .tg th{font-family:Arial, sans-serif;font-size:14px;
                        font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                        .tg .tg-ul38{position:static;text-align:left;top:-1px;vertical-align:middle;will-change:transform}
                        .tg .tg-0lax{text-align:left;vertical-align:middle}
                        .tg-sort-header::-moz-selection{background:0 0}
                        .tg-sort-header::selection{background:0 0}.tg-sort-header{cursor:pointer}
                        .tg-sort-header:after{content:'';float:right;margin-top:7px;visibility:hidden}
                        .tg-sort-header:hover:after{visibility:visible}r
                        th {white-space: nowrap; overflow: hidden; text-overflow: ellipsis;}
                        td {white-space: nowrap; overflow: hidden; text-overflow: ellipsis;}
                        .tg-sort-asc:after,.tg-sort-asc:hover:after,.tg-sort-desc:after{visibility:visible;opacity:.4}
                        .tg-sort-desc:after{border-bottom:none;}@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}
                    </style>
                    <div class="tg-wrap">
                    <table id="tg-dDTF2" class="table table-striped table-hover table-sm">
                        <thead class="table-secondary">
                            <tr>
                                <th style="width:15%;" class="tg-ul38">company</th>
                                <th style="width:15%;" class="tg-ul38">item code</th>
                                <th style="width:35%;" class="tsvag-ul38">item</th>
                                <th style="width:10%;" class="tg-ul38 currency">item cost</th>
                                <th style="width:5%;" class="tg-ul38">qty</th>
                                <th style="width:10%;" class="tg-ul38">cost type</th>
                                <th style="width:10%;" class="tg-ul38 currency">unit cost</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                        @if ($data)
                            @foreach ($data as $line)
                            <tr>
                                <td class="tg-0lax">{{$line->company}}</td>
                                <td class="tg-0lax">{{$line->item_code}}</td>
                                <td class="tg-0lax">{{$line->item}}</td>
                                <td class="tg-0lax">${{$line->item_cost}}</td>
                                <td class="tg-0lax">{{$line->quantity}}</td>
                                <td class="tg-0lax">{{$line->cost_type}}</td>
                                <td class="tg-0lax">${{$line->unit_cost}}</td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <script charset="utf-8">var TGSort=window.TGSort||function(n){"use strict";function r(n){return n?n.length:0}function t(n,t,e,o=0){for(e=r(n);o<e;++o)t(n[o],o)}function e(n){return n.split("").reverse().join("")}function o(n){var e=n[0];return t(n,function(n){for(;!n.startsWith(e);)e=e.substring(0,r(e)-1)}),r(e)}function u(n,r,e=[]){return t(n,function(n){r(n)&&e.push(n)}),e}var a=parseFloat;function i(n,r){return function(t){var e="";return t.replace(n,function(n,t,o){return e=t.replace(r,"")+"."+(o||"").substring(1)}),a(e)}}var s=i(/^(?:\s*)([+-]?(?:\d+)(?:,\d{3})*)(\.\d*)?$/g,/,/g),c=i(/^(?:\s*)([+-]?(?:\d+)(?:\.\d{3})*)(,\d*)?$/g,/\./g);function f(n){var t=a(n);return!isNaN(t)&&r(""+t)+1>=r(n)?t:NaN}function d(n){var e=[],o=n;return t([f,s,c],function(u){var a=[],i=[];t(n,function(n,r){r=u(n),a.push(r),r||i.push(n)}),r(i)<r(o)&&(o=i,e=a)}),r(u(o,function(n){return n==o[0]}))==r(o)?e:[]}function v(n){if("TABLE"==n.nodeName){for(var a=function(r){var e,o,u=[],a=[];return function n(r,e){e(r),t(r.childNodes,function(r){n(r,e)})}(n,function(n){"TR"==(o=n.nodeName)?(e=[],u.push(e),a.push(n)):"TD"!=o&&"TH"!=o||e.push(n)}),[u,a]}(),i=a[0],s=a[1],c=r(i),f=c>1&&r(i[0])<r(i[1])?1:0,v=f+1,p=i[f],h=r(p),l=[],g=[],N=[],m=v;m<c;++m){for(var T=0;T<h;++T){r(g)<h&&g.push([]);var C=i[m][T],L=C.textContent||C.innerText||"";g[T].push(L.trim())}N.push(m-v)}t(p,function(n,t){l[t]=0;var a=n.classList;a.add("tg-sort-header"),n.addEventListener("click",function(){var n=l[t];!function(){for(var n=0;n<h;++n){var r=p[n].classList;r.remove("tg-sort-asc"),r.remove("tg-sort-desc"),l[n]=0}}(),(n=1==n?-1:+!n)&&a.add(n>0?"tg-sort-asc":"tg-sort-desc"),l[t]=n;var i,f=g[t],m=function(r,t){return n*f[r].localeCompare(f[t])||n*(r-t)},T=function(n){var t=d(n);if(!r(t)){var u=o(n),a=o(n.map(e));t=d(n.map(function(n){return n.substring(u,r(n)-a)}))}return t}(f);(r(T)||r(T=r(u(i=f.map(Date.parse),isNaN))?[]:i))&&(m=function(r,t){var e=T[r],o=T[t],u=isNaN(e),a=isNaN(o);return u&&a?0:u?-n:a?n:e>o?n:e<o?-n:n*(r-t)});var C,L=N.slice();L.sort(m);for(var E=v;E<c;++E)(C=s[E].parentNode).removeChild(s[E]);for(E=v;E<c;++E)C.appendChild(s[v+L[E-v]])})})}}n.addEventListener("DOMContentLoaded",function(){for(var t=n.getElementsByClassName("tg"),e=0;e<r(t);++e)try{v(t[e])}catch(n){}})}(document);
                </script>
                </div>
                <div class="ulist" style="text-align:center;">
                    <ul class="pagination" style="display:inline;">
                        <li><a href="?pageno=1">First</a></li>
                        &nbsp &nbsp
                        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                        </li>
                        &nbsp &nbsp
                        <li><?php echo 'page '.$pageno ?></li>
                        &nbsp &nbsp
                        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                        </li>
                        &nbsp &nbsp
                        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                        &nbsp &nbsp
                        
                    </ul>
                </div>
                
                <br><br>
                <div>
                <form action="{{ route('update-list') }}" method="POST" enctype="multipart/form-data" contentType='application/json'>
                    @csrf
                    <label for="recperpage">Rows Per Page:</label>
                    <select id="recperpage" name="recperpage">
                        <option value="25" selected disabled hidden>--</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="500">500</option>
                        <option value="1000">1000</option>
                    </select>
                    <label for="pageno"></label>
                    <select id="pageno" name="pageno" style="visibility:hidden" value="<?php echo $pageno; ?>" >
                        <option value="<?php echo $pageno; ?>"><?php echo $pageno; ?></option>
                    </select>                    
                    <input type="submit">
                </form> 
                </div>
            </div>
        </div>

    <div class="col-md-1"></div>
                            
    </div>
    @endsection
