---
title: On the performance of for loops in R
author: Jose M Sallan
date: '2021-03-05'
slug: [for-loops-R]
categories:
  - R
tags:
  - R
  - optimization
meta_img: images/image.png
description: Description for the page
---

<script src="{{< blogdown/postref >}}index_files/header-attrs/header-attrs.js"></script>


<p>A common advice to R users is that we need to avoid <code>for</code> loops. This is because the basic data types of R are <strong>vectors</strong> (a variable in R is a vector of length one). Let’s see a comparison of the performance of a vectorized operation versus a <code>for</code> loop.</p>
<div id="filtering-a-vector" class="section level2">
<h2>Filtering a vector</h2>
<p>We need to find which positions of a numeric vector <code>vec</code> contain a number <code>num</code>. We may be tempted to do something like this:</p>
<pre class="r"><code>f1 &lt;- function(vec, num){
   n &lt;- length(vec)
  sol &lt;- logical(n)
  k &lt;- 1
  sol &lt;- integer()
  for(i in 1:n){
    if(vec[i] == num){
      sol[k] &lt;- i
      k &lt;- k+1
    }
  }
  return(sol)
}</code></pre>
<p>But as R is a vectorial language, we can obtain the same result doing:</p>
<pre class="r"><code>f2 &lt;- function(vec, num) return(which(vec == num))</code></pre>
<p>Let’s build a large vector, test both functions on it and see if they bring the same result:</p>
<pre class="r"><code>set.seed(1313)
large_vector &lt;- sample(0:9, 10000, replace = TRUE)
s1 &lt;- f1(large_vector, 4)
s2 &lt;- f2(large_vector, 4)
identical(s1, s2)</code></pre>
<pre><code>## [1] TRUE</code></pre>
<p>Let’s examine the speed of both operations with the <code>rbenchmark</code> library:</p>
<pre class="r"><code>library(rbenchmark)
benchmark(f1(large_vector, 4), f2(large_vector, 4), columns=c(&#39;test&#39;, &#39;replications&#39;, &#39;elapsed&#39;, &#39;relative&#39;, &#39;user.self&#39;, &#39;sys.self&#39;), replications = 100, order=&#39;elapsed&#39;)</code></pre>
<pre><code>##                  test replications elapsed relative user.self sys.self
## 2 f2(large_vector, 4)          100   0.006      1.0     0.004    0.001
## 1 f1(large_vector, 4)          100   0.075     12.5     0.066    0.009</code></pre>
<p>We see that the function with a <code>for</code> loop is much slower than the vectorised function. This is empirical evidence advocating using vectorised functions when operating with vectors.</p>
</div>
<div id="sum-columns-of-a-matrix" class="section level2">
<h2>Sum columns of a matrix</h2>
<p>Let’s now sum the columns of a very large matrix. We have three ways of doing that: with a <code>for</code> loop, with an <code>apply</code> loop or with a specific function.</p>
<div id="three-ways-to-do-the-job" class="section level3">
<h3>Three ways to do the job</h3>
<p>To define a function that sums each column and puts the value into a vector component using a <code>for</code> loop:</p>
<pre class="r"><code>f3 &lt;- function(m){
  n &lt;- dim(m)[2]
  s &lt;- numeric(n)
  for(i in 1:n) s[i] &lt;- sum(m[,i])
  return(s)
}</code></pre>
<p>A second possibility is to run a set of vectorized operations. We can do the same with an <code>apply</code> loop over columns:</p>
<pre class="r"><code>f4 &lt;- function(m) return(apply(m, 2, sum))</code></pre>
<p>Finally, we can use a built-in function called <code>colSums</code> that performs that task.</p>
</div>
<div id="testing-performance" class="section level3">
<h3>Testing performance</h3>
<p>Let’s define a very large matrix <code>M</code>, and apply the three functions to it to obtain the sum of columns:</p>
<pre class="r"><code>M &lt;- matrix(sample(1:100, 1000000, replace = TRUE), 1000, 1000)
s3 &lt;- f3(M)
s4 &lt;- f4(M)
s5 &lt;- colSums(M)</code></pre>
<p>The <code>s4</code> vector is integer, and the other two numeric. Let’s check if they yield the same values:</p>
<pre class="r"><code>s4 &lt;- as.numeric(s4)
identical(s3, s4)</code></pre>
<pre><code>## [1] TRUE</code></pre>
<pre class="r"><code>identical(s4, s5)</code></pre>
<pre><code>## [1] TRUE</code></pre>
<pre class="r"><code>identical(s3, s5)</code></pre>
<pre><code>## [1] TRUE</code></pre>
<p>Let’s check the speed of each function:</p>
<pre class="r"><code>library(rbenchmark)
benchmark(f3(M), f4(M), colSums(M), columns=c(&#39;test&#39;, &#39;replications&#39;, &#39;elapsed&#39;, &#39;relative&#39;, &#39;user.self&#39;, &#39;sys.self&#39;), order=&#39;elapsed&#39;)</code></pre>
<pre><code>##         test replications elapsed relative user.self sys.self
## 3 colSums(M)          100   0.091    1.000     0.090    0.001
## 1      f3(M)          100   0.676    7.429     0.613    0.061
## 2      f4(M)          100   1.155   12.692     1.085    0.065</code></pre>
<p>The best performance is achieved by the built-in function. The <code>for</code> loop implementation seems to go faster than <code>apply</code> in this context.</p>
</div>
</div>
<div id="compute-the-means-of-a-list-of-vectors" class="section level2">
<h2>Compute the means of a list of vectors</h2>
<p>Finally, we can consider the job of computing the means of a very large list of vectors. Let’s define a very large list of vectors:</p>
<pre class="r"><code>vectors &lt;- lapply(1:1000, function(x) sample(1:100, 10000, replace = TRUE))</code></pre>
<p>We can compute the mean with a looping function over the list, using the vectorized <code>mean</code> function:</p>
<pre class="r"><code>looping_mean &lt;- function(list){
  n &lt;- length(list)
  means &lt;- numeric(n)
  for(i in 1:n) means[i] &lt;- mean(list[[i]])
  return(means)
}</code></pre>
<p>An alternative for the <code>for</code> loop is the <code>sapply</code> function:</p>
<pre class="r"><code>sapply(vectors, mean)</code></pre>
<p>Both functions return the same result:</p>
<pre class="r"><code>identical(looping_mean(vectors), sapply(vectors, mean))</code></pre>
<pre><code>## [1] TRUE</code></pre>
<p>Alternatively, we want to store the results on a list, instead of a vector:</p>
<pre class="r"><code>lapply(vectors, mean)</code></pre>
<p>Let’s examine the performance of each implementation:</p>
<pre class="r"><code>benchmark(looping_mean(vectors),
          sapply(vectors, mean),
          lapply(vectors, mean),
          columns=c(&#39;test&#39;, &#39;replications&#39;, &#39;elapsed&#39;, &#39;relative&#39;, &#39;user.self&#39;, &#39;sys.self&#39;), 
          order=&#39;elapsed&#39;,
          replications = 100)</code></pre>
<pre><code>##                    test replications elapsed relative user.self sys.self
## 3 lapply(vectors, mean)          100   1.284    1.000     1.276    0.005
## 2 sapply(vectors, mean)          100   1.313    1.023     1.301    0.007
## 1 looping_mean(vectors)          100   1.325    1.032     1.315    0.005</code></pre>
<p>In this case, the three implementations have a similar performance.</p>
</div>
<div id="when-to-avoid-for-loops-in-r" class="section level2">
<h2>When to avoid for loops in R</h2>
<p>This small experiment show us when do we need to avoid for loops in R: when performing vectorized operations. As R is a vectorized language, <strong>we must avoid looping across the components of a vector</strong>, like when filtering a vector. This means that we must avoid looping in operations such as computing summarised vector statistics, or subsetting rows of a data frame. In other contexts, iterating functions of the <code>apply</code> family have a performance similar as <code>for</code> loops. The relative merits of each function seem to depend on each type of iteration.</p>
</div>
