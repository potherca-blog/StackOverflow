---
permalink: /question.13808020.include-an-svg-hosted-on-github-in-markdown/index.html
---

# Linking to SVG files hosted on github

The purpose of `raw.github.com` is to allow users to view the contents of a file, so for text based files (SVG, JS, CSS, etc) this means you get the wrong headers and things break in the browser.

**Update:** <ins>
Github has implemented a feature which makes it possible for SVG's to be used with the Markdown image syntax. The SVG image will be sanitized and displayed with the correct HTTP header. Certain tags (like `<script>`) are removed.

To view the sanitized SVG or to achieve this effect from other places (i.e. from markdown files not hosted in repos on http://github.com/) simply append `?sanitize=true` to the SVG's raw URL.

See the examples below for rendering details.

</ins>

<s>
Although you cannot link directly to SVG images from `raw.github.com` you could put the SVG files on the `gh-pages` branch (or [configure `master` as source][1] for Github Pages) and link to the files from [`github.io`][2]

As the file you are trying to get to display seems to part of your projects documentation this might be a [win-win situation][3]

If using Github Pages is not your thing, [rawgithub.com][4] could be an option. RawGit retrieves your files and sets the correct headers for you.
</s>

- *As stated by [AdamKatz](https://stackoverflow.com/users/519360/) in the comments, using a source other than github.io can introduce potentially privacy and security risks. See the [answer by CiroSantilli](https://stackoverflow.com/a/25606546/153049) and [the answer by DavidChambers](https://stackoverflow.com/a/21521184/153049) for more details.*

- *As stated by [MonsieurDart](https://stackoverflow.com/users/368330/)
in the comments, RawGit [does not work for private repos](http://github.com/rgrove/rawgit/issues/62).*

- *[The issue to resolve this](https://github.com/github/markup/issues/556) was opened on Github on October 13th 2015 and was resolved on August 31th 2017*

---

# Examples

I copied the SVG image from the question to [a repo on github][5] in order to create the examples below:

## Linking to relative files (Works, but obviously only https://github.com/)

### Code

    ![Alt text](./controllers_brief.svg)
    <img src="./controllers_brief.svg">

### Result

![Alt text](./controllers_brief.svg)
<img src="./controllers_brief.svg">

## Linking to RAW files (Does not work)

### Code

    ![Alt text](https://raw.github.com/potherca-blog/StackOverflow/master/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
    <img src="https://raw.github.com/potherca-blog/StackOverflow/master/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

### Result

![Alt text](https://raw.github.com/potherca-blog/StackOverflow/master/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
<img src="https://raw.github.com/potherca-blog/StackOverflow/master/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

## Linking to RAW files using `?sanitize=true` (Works)

### Code

    ![Alt text](https://raw.github.com/potherca-blog/StackOverflow/master/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg?sanitize=true)
    <img src="https://raw.github.com/potherca-blog/StackOverflow/master/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg?sanitize=true">

### Result

![Alt text](https://raw.github.com/potherca-blog/StackOverflow/master/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg?sanitize=true)
<img src="https://raw.github.com/potherca-blog/StackOverflow/master/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg?sanitize=true">

## Linking to files hosted on [github.io][2] (Works)

### Code

    ![Alt text](https://potherca-blog.github.io/StackOverflow/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
    <img src="https://potherca-blog.github.io/StackOverflow/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

### Result

![Alt text](https://potherca-blog.github.io/StackOverflow/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
<img src="https://potherca-blog.github.io/StackOverflow/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

## Linking to RAW files using [rawgithub.com][4] (Also Works)

Note: Sometimes the RawGithub service is down/doesn't work. If you don't see an image below, that is probably the case.

### Code

    ![Alt text](https://rawgithub.com/potherca-blog/StackOverflow/master/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
    <img src="https://rawgithub.com/potherca-blog/StackOverflow/master/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">

### Result

![Alt text](https://rawgithub.com/potherca-blog/StackOverflow/master/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg)
<img src="https://rawgithub.com/potherca-blog/StackOverflow/master/question.13808020.include-an-svg-hosted-on-github-in-markdown/controllers_brief.svg">


  [1]: https://help.github.com/articles/configuring-a-publishing-source-for-github-pages/
  [2]: http://github.io
  [3]: http://en.wikipedia.org/wiki/Win-win
  [4]: https://rawgithub.com/
  [5]: https://github.com/potherca-blog/StackOverflow
