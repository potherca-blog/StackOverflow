---
permalink: /question.13808020.include-an-svg-hosted-on-github-in-markdown/index.html
---

# Linking to SVG files hosted on github

The purpose of `raw.github.com` is to allow users to view the contents of a file, so for text based files (SVG, JS, CSS, etc) this means you get the wrong headers and things break in the browser.

Although you cannot link directly to SVG images from `raw.github.com` you could put the SVG files on the `gh-pages` branch (or [configure `master` as source][1] for Github Pages) and link to the files from [`github.io`][2]

As the file you are trying to get to display seems to part of your projects documentation this might be a [win-win situation][3]

If using Github Pages is not your thing, [rawgithub.com][4] could be an option. RawGit retrieves your files and sets the correct headers for you.

- *As stated by [AdamKatz](https://stackoverflow.com/users/519360/) in the comments, using a source other than github.io can introduce potentially privacy and security risks. See the [answer by CiroSantilli](https://stackoverflow.com/a/25606546/153049) and [the answer by DavidChambers](https://stackoverflow.com/a/21521184/153049) for more details.*

- *As stated by [MonsieurDart](https://stackoverflow.com/users/368330/)
in the comments, RawGit [does not work for private repos](http://github.com/rgrove/rawgit/issues/62).*

- *As stated (in comments and answers) elsewhere on this page, [an issue to resolve this](https://github.com/github/markup/issues/556) has been opened on Github on October 13th 2015. As of [June 5th 2017](https://github.com/github/markup/issues/556#issuecomment-306103203) it is actively being worked on. It has not yet been resolved at the time of this writing <sup>(August 30th 2017)</sup>.*

  [1]: https://help.github.com/articles/configuring-a-publishing-source-for-github-pages/
  [2]: http://github.io
  [3]: http://en.wikipedia.org/wiki/Win-win
  [4]: https://rawgithub.com/
  [5]: https://github.com/potherca-blog/StackOverflow

---
## Examples
### Linking to RAW files
#### Code
    ![Alt text](https://raw.github.com/potherca-blog/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
    <img src="https://raw.github.com/potherca-blog/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

### Result

![Alt text](https://raw.github.com/potherca-blog/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
<img src="https://raw.github.com/potherca-blog/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

### Linking to files using [relative paths](https://help.github.com/articles/relative-links-in-readmes)
#### Code

    ![Alt text](controllers_brief.svg)
    <img src="controllers_brief.svg">

### Result

![Alt text](controllers_brief.svg)
<img src="controllers_brief.svg">


### Linking to files hosted on [github.io][1]
#### Code

    ![Alt text](http://potherca-blog.github.io/StackOverflow/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
    <img src="http://potherca-blog.github.io/StackOverflow/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

### Result

![Alt text](http://potherca-blog.github.io/StackOverflow/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
<img src="http://potherca-blog.github.io/StackOverflow/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

### Linking to RAW files using [rawgithub.com][3]
#### Code
    ![Alt text](https://rawgithub.com/potherca-blog/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
    <img src="https://rawgithub.com/potherca-blog/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

### Result
![Alt text](https://rawgithub.com/potherca-blog/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
<img src="https://rawgithub.com/potherca-blog/StackOverflow/gh-pages/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">


[1]: http://github.io
[2]: http://en.wikipedia.org/wiki/Win-win
[3]: https://rawgithub.com/
