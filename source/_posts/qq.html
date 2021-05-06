---
title: Introducing ggplot
author: Jose M Sallan
date: '2021-02-26'
slug: []
categories:
  - R
tags:
  - ggplot
  - R
meta_img: images/image.png
description: Description for the page
---

<script src="{{< blogdown/postref >}}index_files/header-attrs/header-attrs.js"></script>


<p><code>ggplot2</code> is the package of the Tidyverse to produce elegant visualizations, based on the Grammar of Graphics. To generate a plot with ggplot2 we need:</p>
<ul>
<li>A <strong>dataset</strong> to pick data from. As with the rest of the Tidyverse, ggplot expects tidy data stored into a data frame.</li>
<li>An <strong>aestethic mapping</strong> of the variables of the dataset. Here you will set the plot axis and how you will convey additional information (e.g., coloring points according to a categorical variable).</li>
<li>One or several layers or geoms.</li>
</ul>
<p>There are so much things you can do with ggplot, so we’ll explore very basic possibilities here. Let’s use the <code>iris</code> dataset:</p>
<pre class="r"><code>library(tibble)
iris_tibble &lt;- tibble(iris)
iris_tibble</code></pre>
<pre><code>## # A tibble: 150 x 5
##    Sepal.Length Sepal.Width Petal.Length Petal.Width Species
##           &lt;dbl&gt;       &lt;dbl&gt;        &lt;dbl&gt;       &lt;dbl&gt; &lt;fct&gt;  
##  1          5.1         3.5          1.4         0.2 setosa 
##  2          4.9         3            1.4         0.2 setosa 
##  3          4.7         3.2          1.3         0.2 setosa 
##  4          4.6         3.1          1.5         0.2 setosa 
##  5          5           3.6          1.4         0.2 setosa 
##  6          5.4         3.9          1.7         0.4 setosa 
##  7          4.6         3.4          1.4         0.3 setosa 
##  8          5           3.4          1.5         0.2 setosa 
##  9          4.4         2.9          1.4         0.2 setosa 
## 10          4.9         3.1          1.5         0.1 setosa 
## # … with 140 more rows</code></pre>
<div id="a-univariate-plot" class="section level2">
<h2>A univariate plot</h2>
<p>Let’s examine the properties of the <code>Sepal.Width</code> variable with an histogram. To produce it, we need to:</p>
<ul>
<li>Specify the dataset, <code>iris_tibble</code>,</li>
<li>specify the aesthetic mapping: here is a single variable <code>aes(Sepal.Width)</code>,</li>
<li>define the histogram with <code>geom_histogram()</code>.</li>
</ul>
<pre class="r"><code>library(ggplot2)
ggplot(iris_tibble, aes(Sepal.Width)) + 
  geom_histogram()</code></pre>
<p><img src="{{< blogdown/postref >}}index_files/figure-html/unnamed-chunk-2-1.png" width="672" /></p>
<p>The default value of the number of bins is 30, which are too much bins for this variable. So we have set <code>bins=15</code>. Let’s use <code>labs</code> to set the name of axis and give the plot a title:</p>
<pre class="r"><code>ggplot(iris_tibble, aes(Sepal.Width)) + 
  geom_histogram(bins=15) +
  labs(title=&quot;Distribution of sepal width&quot;, x=&quot;sepal width&quot;, y = &quot;count&quot;)</code></pre>
<p><img src="{{< blogdown/postref >}}index_files/figure-html/unnamed-chunk-3-1.png" width="672" /></p>
</div>
<div id="a-bivariate-plot" class="section level2">
<h2>A bivariate plot</h2>
<p>Let’s now do a scatterplot to examine the relationship between sepal width and sepal length. Now the aesthetic will be <code>aes(Sepal.Length, Sepal.Width)</code> (ggplot is learning that there are continuous variables in both axis) and as we want a point for each observation we will use <code>geom_point()</code>. We’ll also add title and axis with <code>lab</code>.</p>
<pre class="r"><code>ggplot(iris_tibble, aes(Sepal.Length, Sepal.Width)) + 
  geom_point() +
  labs(title = &quot;Sepal length versus sepal width&quot;, x = &quot;sepal length&quot;, y = &quot;sepal width&quot;)</code></pre>
<p><img src="{{< blogdown/postref >}}index_files/figure-html/unnamed-chunk-4-1.png" width="672" /></p>
<p>Let’s try know to see if there are any differences between <code>Species</code>. To do so, we’ll assign a different color to each point depending of its species. We can do that by defining:</p>
<ul>
<li>a specific aesthetic for the points: <code>geom_point(aes(color=Species))</code>,</li>
<li>redefining the aesthetic for the whole plot: <code>ggplot(iris_tibble, aes(Sepal.Length, Sepal.Width, color=Species))</code>.</li>
</ul>
<p>Note that here we are not specifying the actual colors to plot: we are assigning a different color to each observation according to its species. We’ll see that <code>ggplot</code> will assign a default color to each species, and add a legend that allows us to distinguish the Species of each observation.</p>
<pre class="r"><code>ggplot(iris_tibble, aes(Sepal.Length, Sepal.Width, color=Species)) + 
  geom_point() +
  labs(title = &quot;Sepal length versus sepal width&quot;, x = &quot;sepal length&quot;, y = &quot;sepal width&quot;)</code></pre>
<p><img src="{{< blogdown/postref >}}index_files/figure-html/unnamed-chunk-5-1.png" width="672" /></p>
<p>Here we see that the setosa species is quite different from the other two species.</p>
<p>An alternative way of seeing this is by making a plot for each species using <code>facet_grid()</code>:</p>
<pre class="r"><code>ggplot(iris_tibble, aes(Sepal.Length, Sepal.Width)) + 
  geom_point() +
  facet_grid(. ~ Species) +
  labs(title = &quot;Sepal length versus sepal width&quot;, x = &quot;sepal length&quot;, y = &quot;sepal width&quot;)</code></pre>
<p><img src="{{< blogdown/postref >}}index_files/figure-html/unnamed-chunk-6-1.png" width="672" /></p>
<p>This has been a very basic introduction to what <code>ggplot</code> can do. In forthcoming ggplot-related posts we’ll see:</p>
<ul>
<li>how to customize colors, shapes and legends with scales,</li>
<li>how to define themes to customize the appearance of your plot,</li>
<li>how to use other geoms.</li>
</ul>
</div>
<div id="references" class="section level2">
<h2>References</h2>
<p>Wickham, H.; Grolemund, G. <em>R for Data Science.</em> <a href="https://r4ds.had.co.nz/" class="uri">https://r4ds.had.co.nz/</a></p>
<p>Wickham, H.; Navarro, D.; Pedersen, T. L. <em>ggplot2: Elegant Graphics for Data Analysis.</em> <a href="https://ggplot2-book.org/" class="uri">https://ggplot2-book.org/</a></p>
<p>Wilkinson, L. (2005). <em>The Grammar of Graphics.</em> Springer. Statistics and computing series. <a href="https://www.springer.com/gp/book/9780387245447" class="uri">https://www.springer.com/gp/book/9780387245447</a></p>
</div>
