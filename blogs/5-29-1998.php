<?php
	$title = 'xc0py32 &mdash; Weblog 2.0';
	$date  = 'May 30th, 1998';
?>

So it's been a hot minute, and I have moved the retro weblog to xc0py32.com. First I built [this site] it using HTML and Javascript, and yeah on the _whistler1_ (my Windows XP machine). But, I just re-built it using PHP and it's going to be so much easier to manage this way vs having to do this without it.

If, for some reason you're curious, you can see the [http://./media/v1.zip](code of that original site). I also went for a MS-DOS motif just for fun.

So how did I get here?

you see I'm a 30-someting guy who has always wanted to build a vintage Windows98 PC to play DOS games on, but mostly for nostagia. I landed on a Dell Dimension 4700 (I know, not that vintage-but I *was* going for something late 90's early 2000's and this was pretty close). I tried many times to get Windows 95, 98 and even Windows ME (NT) on it but drivers were an issue. So I just went with XP (what it was designed for) as I had the original driver disc's and here I am. I named the build _The WHISTLER_:

![THE WHISTLER](./media/IMG_1676.JPG)

Some of the first things I did was:

- Connect it to the Internet (yes it works)
- Get some cool games installed
- Get it to look as much like Windows 98 and as Retro as I could

I then decided I wanted to blog about this, and here we are. As I said I first hosted a simple version of the blog I wanted to create at `aubrey.pw/d/blog/v1` and at first it was an experiment anyways. The experiment was could I build a blog _on_ the machine I created? So everything started off really rocky.

At first I didn't want to mess around with PHP or anything, I wanted to go really simple at first to see if I even wanted to do it this way. The [first version](./media/v1.zip) was pure HTML, no CSS, and Javascript. It was fun, but coding in [Notepad2](https://www.flos-freeware.ch/notepad2.html) and debugging (or the lack of it) in [K-Meleon](http://kmeleonbrowser.org/) was difficult to say the least. So I decided to try and do a little better and try again.

## Finding an email

So one of the first things I knew I would need is an email. Again, I didn't want anything modern, I wanted to stick with the vintage-feel. Turns out getting email addresses from back-in-the-day is tough. First I got a `@juno.com` one but it wouldn't work really, and turns out signing up for emails either requires you to pay and/or validate using a phone number.

### Looking for a handle

So I had to help myself out a little bit. So I setup a domain and webhosting. Even though I was happy to host this weblog on `aubrey.pw/d/v/...` having an email `@aubrey.pw` seemed a little off. I was sort-of looking out for an alias to use instead of my usual username, something retro, something unique and different enough from my other handles....

I went with `xc0py32`, as it was unique enough and early in the WHISTLER saga I was using `xcopy32.exe` **a lot**! 

So I bought and setup `xc0py32.com` and an email for it. I already had a really cool retro-styled browser called [RetroZilla](https://rn10950.github.io/RetroZillaWeb/) installed which is a modern build of the nostalgic Netscape Navigator, but it also came with mail client which was easy enough to setup. 

If you want to email me it's: `mail [-at@-] xc0py32 [-dot.] com`

Once I finally got that setup I knew I wanted to version control the build.....and I had to help myself out again. At the time the K-Meleon browser couldn't handle Github, and plus it felt a little too modern. I tried using SourceForge and even some odd-SVN repository services out there. But again... paid.... bad.... so I just signed up for a [Github](https://github.com/xc0py32) account on my main computer, setup a repo, and now I had to install Git somehow....

### Version Control

Turns out that's pretty simple to do, you just always have to get the right versions of things to get. Once I found the last version of Git to run on Windows XP (`2.10`) I was able to install it no-sweat...

Now it turns out Git will just install BASH on your Windows setup. Now, as a developer I'm very familiar with Git and UNIX so it almost felt like cheating using BASH and Git on Windows like I would anywhere, but I took it! I could now update a repo pretty easily...

..and it gives me a BASH interface to use, again, which can feel like cheating but it also helped me generate legit ssh keys, etc to work on Github (Putty had trouble).

### Notepad++

So, up until this point I was using Notepad 2 to edit files. But I needed something a little more robust. I went with a tool I used back in the early 2000's: Notepad++. I also tinkered around with ActiveState Komodo Edit but NotePad++ still runs the latest on Windows XP!

### PHP and New/Pale Moon

So, as I said, I first built this thing on JS and HTML. But after hours and hours of debugging a site and writing old-browser compatible Javascript, I thought it had to be easier. First, my browser, K-Meleon was really retro and nice, but had _zero_ debugging beyond `alert()` so I set out to see if there was some-kind of browser out there that had some kind of debugging but also could load a more modern site (RetroZilla, IE, etc could not even load this site). 

That's when I ran into [this page](https://rn10950.github.io/RetroZillaWeb/) which had a build of the Pale Moon browser specifically designed for Windows XP (New Moon)...and guess what it had:

![New Moon with modern debugger](./media/new-moon-dev-tools.png)

...devtools! And it loaded substancially more webpages (like Github) than K-Meleon!

#### PHP

Anyways. I also decided that trying to build a dynamic weblog with JS was becomming maddening (I even built an early version of this site using JS), and even with a debugger I decided I wanted to use PHP.

So PHP was pretty easy to install and I knew I could spin up an easy-enough PHP server using:

```
c:\PHP\php.exe -S localhost:80
```

So after installing `5.4.9` (the last versio to run on Windows XP) I was able to spin up a PHP server and get to work...

#### Notepad ++ Customizations

Because I now had Bash and an easy way to spin up a server I could use Notepad++'s **run** feature and add a couple of commands:

- **Serve**: `c:\PHP\php.exe -S localhost:80 -t "$(CURRENT_DIRECTORY)"`
- **Bash**:  `c:\Program Files\Git\git-bash --cd "$(CURRENT_DIRECTORY)"`

With these two I could easily do `Run > Serve` and spin-up an easy `localhost` and do `Run > Bash` to start typing up Git commands.

![](./media/dev-tools-all.png)

## Publishing

So, the final piece is how I publish my website. Yes, basic FTP but I found a really cool tool called [Web Site Publisher](http://www.cryer.co.uk/downloads/websitepublisher/index.htm) that allows you to click a button to deploy your site via FTP. It will also do an `rsync` like delete of files you remove, etc. So I added a Notepad++ run command:

![](./media/web-site-publisher.png)

- **Publish**: `"C:\Program Files\Cryer\Web Site Publisher\BCWebSitePublisher.exe"`

And now at the push of a button I should be able to publish this blog.

## Conclusion?

And here I am! I've written this entire blog in Markdown, which now is easier to parse into a document using PHP rather than JS.

There's still a lot more to tell, but hopefully this at least explains how this blog came to be and how it was **built on a Windows XP computer**

More to come!