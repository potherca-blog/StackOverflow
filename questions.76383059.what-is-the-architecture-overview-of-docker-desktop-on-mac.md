# What is the (architecture) overview of Docker Desktop on Mac?

## Question

I am trying to understand how Docker Desktop for Mac works. Specifically, an overview of the architecture.

There is an image of the generic architecture on the "Overview" page of the "Getting Started" guide.

[![enter image description here][2]][1]


However, this does not explain the distinction between Docker on Linux (which runs natively) and Docker Desktop on Mac (which runs inside a Virtual Machine).

I would assume things would look a bit like this:

[![enter image description here][5]][4]

But this is a gross oversimplification, things are missing from this picture.

**How does the architecture of Docker Desktop on Mac look?**

I've tried piecing things together for myself, but there seems to be a lot of incomplete or conflicting information online. Often it is not clear whether the information given relates to the deprecated Docker Toolbox, Docker Machine or Docker for Mac, or to Docker Desktop on Mac.

 - - -

**[UPDATE]**: I came across this overview in a [blog post on docker.com from 2016](https://www.docker.com/blog/docker-unikernels-open-source/) which seems to be more or less what I am looking for, but I do not know enough of Docker to judge whether that information is still correct (or even relevant) today.

[![enter image description here][6]](https://www.docker.com/blog/docker-unikernels-open-source/)

  [1]: https://web.archive.org/web/20230909193332/https://docs.docker.com/assets/images/architecture.svg
  [2]: https://i.sstatic.net/n0PCc.png
  [3]: https://cdn-0.plantuml.com/plantuml/png/RL1VI_im57s_doA_ydlGXxPRrLbzaE4c22g2ekzPahN1D1d93NE8tzsqIxiEpKikz_mvXpjtI2twHi4_gPdoN90QSUEkyxoI3hEDmLhOZD6SYrAmwVgYBCJPwd95fupDYgkocF19CMFbUUvmfuJBP6i6A549aZnHzloQ0526nf8t9ooXZlZm0wmjRGBbtZWaWLTBBP8MhTl55v3m6BMSt5gpZKAcfD087KQhC99aQTX701STqkbvjzcJOiQZrFxpGI9vbnOzLNqUEOdojiHf4bFRPmL3gYibXeGxNVKDwKQEgB_BB0LjZ1wLuN-H5qOZ3PQMl7YDijbxixWTQRvX6BNXXqQ3mR4GzfgWWlRG9Bs9BSX_PfInMMNfheVYIOyWYFHqK7A8Vr2C6nv6alen111zKpvUzp4xePJPmbnexXlr0m00
  [4]: https://www.plantuml.com/plantuml/uml/RL1VI_im57s_doA_ydlGXxPRrLbzaE4c22g2ekzPahN1D1d93NE8tzsqIxiEpKikz_mvXpjtI2twHi4_gPdoN90QSUEkyxoI3hEDmLhOZD6SYrAmwVgYBCJPwd95fupDYgkocF19CMFbUUvmfuJBP6i6A549aZnHzloQ0526nf8t9ooXZlZm0wmjRGBbtZWaWLTBBP8MhTl55v3m6BMSt5gpZKAcfD087KQhC99aQTX701STqkbvjzcJOiQZrFxpGI9vbnOzLNqUEOdojiHf4bFRPmL3gYibXeGxNVKDwKQEgB_BB0LjZ1wLuN-H5qOZ3PQMl7YDijbxixWTQRvX6BNXXqQ3mR4GzfgWWlRG9Bs9BSX_PfInMMNfheVYIOyWYFHqK7A8Vr2C6nv6alen111zKpvUzp4xePJPmbnexXlr0m00
  [5]: https://i.sstatic.net/lsAmI.png
  [6]: https://i.sstatic.net/9oowG.png

<h2>Answers</h2>
<table><tr><td>
  
I am not an expert in the internals of Docker Desktop but your guest is correct, Docker will only run natively in Linux systems, in Windows and macOS you need some kind of hypervisor technology to provide the necessary capabilities to run the Docker engine.

In Windows, you can choose between using Hyper-V and the new backend based on WSL2.

In macOS, [Docker Desktop on Mac](https://github.com/docker/for-mac#component-projects) uses different components, especially [HyperKit](https://github.com/moby/hyperkit), an hypervisor for macOS built using the [Hypervisor.Framework](https://developer.apple.com/documentation/hypervisor) originally derived from [xhyve](https://github.com/moby/hyperkit/blob/master/README.xhyve.md).

Please, consider read [this related SO question](https://stackoverflow.com/questions/48251703/if-docker-runs-natively-on-windows-then-why-does-it-need-hyper-v) as well, despite the fact it is Windows based I think it could be of help.


<sup>answered Jun 4, 2023 at 22:16 [jccampanero](https://stackoverflow.com/users/13942448/jccampanero)<sup>

</td></tr><tr><td>

In this link you can find part of the information you are looking for, it can serve as a starting point for the information you are looking for
https://collabnix.com/how-docker-for-mac-works-under-the-hood/


image from collabnix.com:

![image from collabnix.com](https://i.sstatic.net/rMDzw.png)

the configuration of linux VM for MAC Hyperkit can be found in this repository
https://github.com/linuxkit/linuxkit/blob/master/examples/docker-for-mac.yml

<sup>answered Jun 5, 2023 at 13:14 [rafapc2](https://stackoverflow.com/users/10369266/rafapc2)</sup>

</td></tr></table>

