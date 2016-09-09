---
permalink: /question.13808020.include-an-svg-hosted-on-github-in-markdown
---
# Linking to SVG files hosted on github

The purpose of `raw.github.com` is to allow users to view the contents of a 
file, so for text based files (SVG, JS, CSS, etc) this means you get the wrong 
headers and things break in the browser.

Although you cannot link directly to SVG images from `raw.github.com` you could 
put the SVG files on the `gh-pages` branch and link to the files from [`github.io`][1]

As the file you are trying to get to display seems to part of your projects 
documentation this might be a [win-win situation][2]

If you don't want to have your SVG file in your gh-pages branch you should take a 
look at [rawgithub.com][3] which retrieves your files and 
sets the correct headers for you.

---
## Examples
### Linking to RAW files
#### Code
    ![Alt text](https://raw.github.com/potherca/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
    <img src="https://raw.github.com/potherca/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

###Result
![Alt text](https://raw.github.com/potherca/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
<img src="https://raw.github.com/potherca/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

### Linking to files using [relative paths](https://help.github.com/articles/relative-links-in-readmes)
#### Code

    ![Alt text](controllers_brief.svg)
    <img src="controllers_brief.svg">

###Result
![Alt text](controllers_brief.svg)
<img src="controllers_brief.svg">


### Linking to files hosted on [github.io][1]
#### Code

    ![Alt text](http://potherca.github.io/StackOverflow/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
    <img src="http://potherca.github.io/StackOverflow/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

###Result
![Alt text](http://potherca.github.io/StackOverflow/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
<img src="http://potherca.github.io/StackOverflow/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

### Linking to RAW files using [rawgithub.com][3]
#### Code
    ![Alt text](https://rawgithub.com/potherca/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
    <img src="https://rawgithub.com/potherca/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

###Result
![Alt text](https://rawgithub.com/potherca/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
<img src="https://rawgithub.com/potherca/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">


[1]: http://github.io
[2]: http://en.wikipedia.org/wiki/Win-win
[3]: https://rawgithub.com/
