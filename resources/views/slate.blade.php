<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Linked Events Tampere API Reference</title>

    <style>
        .highlight table td { padding: 5px; }
        .highlight table pre { margin: 0; }
        .highlight .gh {
            color: #999999;
        }
        .highlight .sr {
            color: #f6aa11;
        }
        .highlight .go {
            color: #888888;
        }
        .highlight .gp {
            color: #555555;
        }
        .highlight .gs {
        }
        .highlight .gu {
            color: #aaaaaa;
        }
        .highlight .nb {
            color: #f6aa11;
        }
        .highlight .cm {
            color: #75715e;
        }
        .highlight .cp {
            color: #75715e;
        }
        .highlight .c1 {
            color: #75715e;
        }
        .highlight .cs {
            color: #75715e;
        }
        .highlight .c, .highlight .cd {
            color: #75715e;
        }
        .highlight .err {
            color: #960050;
        }
        .highlight .gr {
            color: #960050;
        }
        .highlight .gt {
            color: #960050;
        }
        .highlight .gd {
            color: #49483e;
        }
        .highlight .gi {
            color: #49483e;
        }
        .highlight .ge {
            color: #49483e;
        }
        .highlight .kc {
            color: #66d9ef;
        }
        .highlight .kd {
            color: #66d9ef;
        }
        .highlight .kr {
            color: #66d9ef;
        }
        .highlight .no {
            color: #66d9ef;
        }
        .highlight .kt {
            color: #66d9ef;
        }
        .highlight .mf {
            color: #ae81ff;
        }
        .highlight .mh {
            color: #ae81ff;
        }
        .highlight .il {
            color: #ae81ff;
        }
        .highlight .mi {
            color: #ae81ff;
        }
        .highlight .mo {
            color: #ae81ff;
        }
        .highlight .m, .highlight .mb, .highlight .mx {
            color: #ae81ff;
        }
        .highlight .sc {
            color: #ae81ff;
        }
        .highlight .se {
            color: #ae81ff;
        }
        .highlight .ss {
            color: #ae81ff;
        }
        .highlight .sd {
            color: #e6db74;
        }
        .highlight .s2 {
            color: #e6db74;
        }
        .highlight .sb {
            color: #e6db74;
        }
        .highlight .sh {
            color: #e6db74;
        }
        .highlight .si {
            color: #e6db74;
        }
        .highlight .sx {
            color: #e6db74;
        }
        .highlight .s1 {
            color: #e6db74;
        }
        .highlight .s {
            color: #e6db74;
        }
        .highlight .na {
            color: #a6e22e;
        }
        .highlight .nc {
            color: #a6e22e;
        }
        .highlight .nd {
            color: #a6e22e;
        }
        .highlight .ne {
            color: #a6e22e;
        }
        .highlight .nf {
            color: #a6e22e;
        }
        .highlight .vc {
            color: #ffffff;
        }
        .highlight .nn {
            color: #ffffff;
        }
        .highlight .nl {
            color: #ffffff;
        }
        .highlight .ni {
            color: #ffffff;
        }
        .highlight .bp {
            color: #ffffff;
        }
        .highlight .vg {
            color: #ffffff;
        }
        .highlight .vi {
            color: #ffffff;
        }
        .highlight .nv {
            color: #ffffff;
        }
        .highlight .w {
            color: #ffffff;
        }
        .highlight {
            color: #ffffff;
        }
        .highlight .n, .highlight .py, .highlight .nx {
            color: #ffffff;
        }
        .highlight .ow {
            color: #f92672;
        }
        .highlight .nt {
            color: #f92672;
        }
        .highlight .k, .highlight .kv {
            color: #f92672;
        }
        .highlight .kn {
            color: #f92672;
        }
        .highlight .kp {
            color: #f92672;
        }
        .highlight .o {
            color: #f92672;
        }
    </style>
    <link href="stylesheets/screen.css" rel="stylesheet" media="screen" />
    <link href="stylesheets/print.css" rel="stylesheet" media="print" />
    <script src="javascripts/all.js"></script>
</head>

<body class="index" data-languages="[&quot;shell&quot;,&quot;javascript&quot;]">
<a href="#" id="nav-button">
      <span>
        NAV
        <img src="images/navbar.png" alt="Navbar" />
      </span>
</a>
<div class="tocify-wrapper">
    <img src="images/logo.png" alt="Logo" />
    <div class="lang-selector">
        <a href="#" data-language-name="shell">shell</a>
        <a href="#" data-language-name="javascript">javascript</a>
    </div>
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>
    <div id="toc">
    </div>
    <ul class="toc-footer">
        <li><a href='https://github.com/tripit/slate'>Documentation Powered by Slate</a></li>
    </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>

        <p>Aggregates data about events around the city</p>

        <p>API location (this page): <a href="http://api.tampere.fi/">http://api.tampere.fi/</a></p>

        <p>API endpoints:</p>

        <ul>
            <li><a href="http://api.tampere.fi/event">http://api.tampere.fi/event</a></li>
            <li><a href="http://api.tampere.fi/keyword">http://api.tampere.fi/keyword</a></li>
            <li><a href="http://api.tampere.fi/place">http://api.tampere.fi/place</a></li>
            <li><a href="http://api.tampere.fi/search">http://api.tampere.fi/search</a></li>
        </ul>

        <p>Linked Events provides categorized data on events and places for Tampere region. The API contains all event data from the Visit Tampere API. In addition, Linked Events will be containing all suitable event data from Menovinkki.</p>

        <p>The location information is not linked to any locational database and exists only as a part of the event information.</p>

        <p>In the API, you can search data by date, keywords or freetext.</p>

        <p>The API provides data in JSON-LD format.</p>

        <h1 id="events">Events</h1>

        <h2 id="get-all-events">Get All Events</h2>
        <pre class="highlight shell tab-shell"><code>curl <span class="s2">"http://api.tampere.fi/event"</span>
</code></pre><pre class="highlight javascript tab-javascript"><code><span class="kr">const</span> <span class="nx">axios</span> <span class="o">=</span> <span class="nx">require</span><span class="p">(</span><span class="s1">'axios'</span><span class="p">);</span>

<span class="kd">let</span> <span class="nx">events</span> <span class="o">=</span> <span class="nx">axios</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s1">'http://api.tampere.fi/event'</span><span class="p">);</span>
</code></pre>
        <blockquote>
            <p>The above command returns JSON-LD structured like this:</p>
        </blockquote>
        <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"meta"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">803</span><span class="p">,</span><span class="w">
        </span><span class="s2">"next"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/event?page=2"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"previous"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w">
    </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere:10685"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"@id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/event/visittampere:10685"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"@context"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://schema.org"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"@type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Event/LinkedEvent"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"location"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere:10685"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"@id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/place/visittampere:10685"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"@context"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://schema.org"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"@type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Place"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                    </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Useita tapahtumapaikkoja"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Useita tapahtumapaikkoja"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Useita tapahtumapaikkoja"</span><span class="w">
                </span><span class="p">},</span><span class="w">
                </span><span class="s2">"street_address"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                    </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Useita tapahtumapaikkoja"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Useita tapahtumapaikkoja"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Useita tapahtumapaikkoja"</span><span class="w">
                </span><span class="p">},</span><span class="w">
                </span><span class="s2">"address_region"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tampere"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"postal_code"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
                </span><span class="s2">"data_source_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Фестиваль гитарной музыки Тампере"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"12-й фестиваль гитарной музыки Тампере пройдет 4-12 декабря 2016. В эти дни гитарная музыка в исполнении мастеров со всего мира будет звучать на главных концертных площадках города, в церквях и даже сауне. В программе также мастер-классы."</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="s2">"super_event"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"last_modified_time"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-31T13:23:17+0000"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"info_url"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://www.tgf.fi/"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://www.tgf.fi/"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://www.tgf.fi/"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="s2">"date_published"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-03-11T13:20:09+0000"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"image"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://visittampere.fi/media/f1925e10-ec48-11e5-befd-3993d28fed11.jpg"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"offers"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="s2">"is_free"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"info_url"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                        </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://www.lippu.fi/12-tampere-guitar-festival-2016-arthur-bochkivskiy-rus-tampere-Lippuja.html?affiliate=ADV&amp;doc=artistPages%2Ftickets&amp;fun=artist&amp;action=tickets&amp;key=1610424%247566724"</span><span class="p">,</span><span class="w">
                        </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://www.lippu.fi/12-tampere-guitar-festival-2016-arthur-bochkivskiy-rus-tampere-Lippuja.html?affiliate=ADV&amp;doc=artistPages%2Ftickets&amp;fun=artist&amp;action=tickets&amp;key=1610424%247566724"</span><span class="p">,</span><span class="w">
                        </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://www.lippu.fi/12-tampere-guitar-festival-2016-arthur-bochkivskiy-rus-tampere-Lippuja.html?affiliate=ADV&amp;doc=artistPages%2Ftickets&amp;fun=artist&amp;action=tickets&amp;key=1610424%247566724"</span><span class="w">
                    </span><span class="p">}</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="s2">"keywords"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere:festival"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"aggregate"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"data_source"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                        </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"festival"</span><span class="p">,</span><span class="w">
                        </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"festival"</span><span class="p">,</span><span class="w">
                        </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"festival"</span><span class="w">
                    </span><span class="p">},</span><span class="w">
                    </span><span class="s2">"@id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/keyword/visittampere:festival"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"@context"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://schema.org"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"@type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Keyword"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="s2">"start_time"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-06-03T21:00:00+0000"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"end_time"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-06-12T20:59:59+0000"</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
        <p>This endpoint retrieves all events as paginated object array.</p>

        <h3 id="http-request">HTTP Request</h3>

        <p><code class="prettyprint">GET http://api.tampere.fi/event</code></p>

        <h3 id="query-parameters">Query Parameters</h3>

        <table><thead>
            <tr>
                <th>Parameter</th>
                <th>Default</th>
                <th>Description</th>
            </tr>
            </thead><tbody>
            <tr>
                <td>page</td>
                <td>1</td>
                <td>Chuck of paginated results</td>
            </tr>
            </tbody></table>

        <aside class="info">
            Default pagination length is 25 event objects.
        </aside>

        <h2 id="get-a-specific-event">Get a Specific Event</h2>
        <pre class="highlight shell tab-shell"><code>curl <span class="s2">"http://api.tampere.fi/event/visittampere:1754"</span>
</code></pre><pre class="highlight javascript tab-javascript"><code><span class="kr">const</span> <span class="nx">axios</span> <span class="o">=</span> <span class="nx">require</span><span class="p">(</span><span class="s1">'axios'</span><span class="p">);</span>

<span class="kd">let</span> <span class="nx">events</span> <span class="o">=</span> <span class="nx">axios</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s1">'http://api.tampere.fi/event/visittampere:1754'</span><span class="p">);</span>
</code></pre>
        <blockquote>
            <p>The above command returns JSON-LD structured like this:</p>
        </blockquote>
        <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere:1754"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"@id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/event/visittampere:1754"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"@context"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://schema.org"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"@type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Event/LinkedEvent"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"location"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere:4056"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"@id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/place/visittampere:4056"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"@context"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://schema.org"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"@type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Place"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Laukontori"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Laukontori"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Laukontori"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="s2">"street_address"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Laukontori"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Laukontori"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Laukontori"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="s2">"address_region"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tampere"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"postal_code"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"data_source_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere"</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Restaurant Boat's dinner cruise"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Водный круиз и ланч на борту"</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"A delicious dining experience with a thoroughly relaxing cruise."</span><span class="p">,</span><span class="w">
            </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Традиционный ланч из финских лакомств и расслабляющй круиз по озеру"</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"super_event"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"@id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/event/visittampere:4056"</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"last_modified_time"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-31T13:22:57+0000"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"info_url"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://www.ravintolalaiva.fi"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://www.ravintolalaiva.fi"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://www.ravintolalaiva.fi"</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"date_published"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2015-03-18T12:32:31+0000"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"image"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://visittampere.fi/media/15d3a690-d2ea-11e4-9def-7f9a6b524531.jpg"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"offers"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="s2">"is_free"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
                </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
                </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
                </span><span class="s2">"info_url"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"keywords"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere:other-event"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"aggregate"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
                </span><span class="s2">"data_source"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                    </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"other-event"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"other-event"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"other-event"</span><span class="w">
                </span><span class="p">},</span><span class="w">
                </span><span class="s2">"@id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/keyword/visittampere:other-event"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"@context"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://schema.org"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"@type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Keyword"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"start_time"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2015-08-01T16:00:00+0000"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"end_time"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2015-08-01T19:00:00+0000"</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
        <p>This endpoint retrieves a specific event.</p>

        <aside class="info">Some event are recurring. Each iteration can be fetched individually, see super_event@id for parent event.</aside>

        <h3 id="http-request">HTTP Request</h3>

        <p><code class="prettyprint">GET http://api.tampere.fi/event/&lt;ID&gt;</code></p>

        <h3 id="url-parameters">URL Parameters</h3>

        <table><thead>
            <tr>
                <th>Parameter</th>
                <th>Description</th>
            </tr>
            </thead><tbody>
            <tr>
                <td>ID</td>
                <td>The ID of the event to retrieve</td>
            </tr>
            </tbody></table>

        <h3 id="notes-about-offers-objects">Notes About Offers-objects</h3>

        <p>Since the origin API seems to have some inconsistencies with the way they notate whether some event is free or not, the <code class="prettyprint">is_free</code> can sometimes be true even if there is a clear ticket link. The same way the <code class="prettyprint">is_free</code> can also be false without any ticket links.</p>

        <h1 id="places">Places</h1>

        <h2 id="get-all-places">Get All Places</h2>
        <pre class="highlight shell tab-shell"><code>curl <span class="s2">"http://api.tampere.fi/place"</span>
</code></pre><pre class="highlight javascript tab-javascript"><code><span class="kr">const</span> <span class="nx">axios</span> <span class="o">=</span> <span class="nx">require</span><span class="p">(</span><span class="s1">'axios'</span><span class="p">);</span>

<span class="kd">let</span> <span class="nx">events</span> <span class="o">=</span> <span class="nx">axios</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s1">'http://api.tampere.fi/place'</span><span class="p">);</span>
</code></pre>
        <blockquote>
            <p>The above command returns JSON-LD structured like this:</p>
        </blockquote>
        <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"meta"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">244</span><span class="p">,</span><span class="w">
        </span><span class="s2">"next"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/place?page=2"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"previous"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere:11035"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"@id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/place/visittampere:11035"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"@context"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://schema.org"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"@type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Place"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kirkkovainiontie 10"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kirkkovainiontie 10"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kirkkovainiontie 10"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="s2">"street_address"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kirkkovainiontie 10"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kirkkovainiontie 10"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kirkkovainiontie 10"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="s2">"address_region"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Valkeakoski"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"postal_code"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"data_source_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere"</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
        <p>This endpoint retrieves all places as object array.</p>

        <h3 id="http-request">HTTP Request</h3>

        <p><code class="prettyprint">GET http://api.tampere.fi/place</code></p>

        <aside class="info">
            As there currently is no place registry, all events have a one-to-one relation to a place object even if the place information currently is the same between two or more events. This is because the origin API does not share place objects and we must retain the option to modify one events place information without affecting the other events.
        </aside>

        <aside class="danger">
            As locations do not necessarily have enough information for geolocation they have not been geolocated. As such there is currently not enough data to perform geo-queries such as limiting results with a bounding box or radii.
        </aside>

        <h2 id="get-a-specific-place">Get a Specific Place</h2>
        <pre class="highlight shell tab-shell"><code>curl <span class="s2">"http://api.tampere.fi/place/visittampere:11035"</span>
</code></pre><pre class="highlight javascript tab-javascript"><code><span class="kr">const</span> <span class="nx">axios</span> <span class="o">=</span> <span class="nx">require</span><span class="p">(</span><span class="s1">'axios'</span><span class="p">);</span>

<span class="kd">let</span> <span class="nx">events</span> <span class="o">=</span> <span class="nx">axios</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s1">'http://api.tampere.fi/place/visittampere:11035'</span><span class="p">);</span>
</code></pre>
        <blockquote>
            <p>The above command returns JSON-LD structured like this:</p>
        </blockquote>
        <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere:11035"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"@id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/place/visittampere:11035"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"@context"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://schema.org"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"@type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Place"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kirkkovainiontie 10"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kirkkovainiontie 10"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kirkkovainiontie 10"</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"street_address"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kirkkovainiontie 10"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kirkkovainiontie 10"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kirkkovainiontie 10"</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"address_region"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Valkeakoski"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"postal_code"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"data_source_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere"</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
        <p>This endpoint retrieves a specific place.</p>

        <h3 id="http-request">HTTP Request</h3>

        <p><code class="prettyprint">GET http://api.tampere.fi/place/&lt;ID&gt;</code></p>

        <h3 id="url-parameters">URL Parameters</h3>

        <table><thead>
            <tr>
                <th>Parameter</th>
                <th>Description</th>
            </tr>
            </thead><tbody>
            <tr>
                <td>ID</td>
                <td>The ID of the place to retrieve</td>
            </tr>
            </tbody></table>

        <h1 id="keywords">Keywords</h1>

        <h2 id="get-all-keywords">Get All Keywords</h2>
        <pre class="highlight shell tab-shell"><code>curl <span class="s2">"http://api.tampere.fi/keyword"</span>
</code></pre><pre class="highlight javascript tab-javascript"><code><span class="kr">const</span> <span class="nx">axios</span> <span class="o">=</span> <span class="nx">require</span><span class="p">(</span><span class="s1">'axios'</span><span class="p">);</span>

<span class="kd">let</span> <span class="nx">events</span> <span class="o">=</span> <span class="nx">axios</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s1">'http://api.tampere.fi/keyword'</span><span class="p">);</span>
</code></pre>
        <blockquote>
            <p>The above command returns JSON-LD structured like this:</p>
        </blockquote>
        <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"meta"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">17</span><span class="p">,</span><span class="w">
        </span><span class="s2">"next"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"previous"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere:business"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"aggregate"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"data_source"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"business"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"business"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"business"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="s2">"@id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/keyword/visittampere:business"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"@context"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://schema.org"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"@type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Keyword"</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
        <p>This endpoint retrieves all keywords as object array.</p>

        <h3 id="http-request">HTTP Request</h3>

        <p><code class="prettyprint">GET http://api.tampere.fi/keyword</code></p>

        <h2 id="get-a-specific-keyword">Get a Specific Keyword</h2>
        <pre class="highlight shell tab-shell"><code>curl <span class="s2">"http://api.tampere.fi/keyword/visittampere:business"</span>
</code></pre><pre class="highlight javascript tab-javascript"><code><span class="kr">const</span> <span class="nx">axios</span> <span class="o">=</span> <span class="nx">require</span><span class="p">(</span><span class="s1">'axios'</span><span class="p">);</span>

<span class="kd">let</span> <span class="nx">events</span> <span class="o">=</span> <span class="nx">axios</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s1">'http://api.tampere.fi/keyword/visittampere:business'</span><span class="p">);</span>
</code></pre>
        <blockquote>
            <p>The above command returns JSON-LD structured like this:</p>
        </blockquote>
        <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere:business"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"aggregate"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"data_source"</span><span class="p">:</span><span class="w"> </span><span class="s2">"visittampere"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"fi"</span><span class="p">:</span><span class="w"> </span><span class="s2">"business"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"en"</span><span class="p">:</span><span class="w"> </span><span class="s2">"business"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"ru"</span><span class="p">:</span><span class="w"> </span><span class="s2">"business"</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"@id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://api.tampere.fi/keyword/visittampere:business"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"@context"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://schema.org"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"@type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Keyword"</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
        <p>This endpoint retrieves a specific keyword.</p>

        <h3 id="http-request">HTTP Request</h3>

        <p><code class="prettyprint">GET http://api.tampere.fi/keyword/&lt;ID&gt;</code></p>

        <h3 id="url-parameters">URL Parameters</h3>

        <table><thead>
            <tr>
                <th>Parameter</th>
                <th>Description</th>
            </tr>
            </thead><tbody>
            <tr>
                <td>ID</td>
                <td>The ID of the keyword to retrieve</td>
            </tr>
            </tbody></table>

        <h1 id="errors">Errors</h1>

        <aside class="notice">Most errors relate to not found</aside>

        <p>The Linked Events Tampere API uses the following error codes:</p>

        <table><thead>
            <tr>
                <th>Error Code</th>
                <th>Meaning</th>
            </tr>
            </thead><tbody>
            <tr>
                <td>200</td>
                <td>OK, not error</td>
            </tr>
            <tr>
                <td>404</td>
                <td>Not Found &ndash; The specified event could not be found</td>
            </tr>
            <tr>
                <td>418</td>
                <td>I&rsquo;m a teapot</td>
            </tr>
            <tr>
                <td>500</td>
                <td>Internal Server Error &ndash; We had a problem with our server. Try again later.</td>
            </tr>
            <tr>
                <td>503</td>
                <td>Service Unavailable &ndash; We&rsquo;re temporarily offline for maintenance. Please try again later.</td>
            </tr>
            </tbody></table>

    </div>
    <div class="dark-box">
        <div class="lang-selector">
            <a href="#" data-language-name="shell">shell</a>
            <a href="#" data-language-name="javascript">javascript</a>
        </div>
    </div>
</div>
</body>
</html>
