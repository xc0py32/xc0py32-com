<?php
	$title = 'Goodwill Haul + 500gb HD Upgrade';
	$date  = 'June 5th, 1998';
?>

# Haul

Today, scouring Goodwll I was able to get a few items:

- A Logitec Keyboard &amp; Mouse Combo
- An Allsop case to hold a build up of burt CD's and floppies

![](./media/goodwill-keyboard.jpg)

![](./media/allsop-case.jpg)

_The case had a few CD's in it and one of them was Publisher 97!_

![](./media/publisher.jpg)

It' also had some other games I couldn't get to run right away.

![](./media/software95.jpg)

The keyboard isn't a Dell, but I got tired of the older keyboard's keys sticking and being really loud. This new one was in an original sealed box so it was a ~2000's era keyboard but but had no gunk or anything. Also it keeps up with the look...

Also the case isn't that big of a deal but I did like the retro blue button and the white-beige case to hold the growing number of CD's I'm accumulating.

# 500gb HD Upgrade

For today's project I wanted to swap out the 40GB drive I had in the Whistler with a 500GB drive I had lying around. The 40GB was loud and slow, and I knew the 500GB I had was quite and should be faster (and more space right). 

So I downloaded Clonezilla which copied the contents from my 40GB to my 500GB but it left the partition size at 40GB. To get the rest of the 450GB in there, I had to boot a GParted live CD and resize the partition up to the MAX ~500GB or so, with success.

![](./media/clonezilla.jpg)

![](./media/500gb.jpg)

One theory I had (why my system was running so slow) was the seek time of the older hard drive. Having the newer one in proves my theory as it has sped up quite a bit!

# A note on Backups

I use `ntbackup` quite a bit to do my backups (along somewhat with System Restore), but after swapping the drives I kept getting an error about it not being able to create a shadow parition. After some googling if you don't use the wizard and just select e.g. C: and click Backup button, you can select Advanced and tell it not to make a Shadow Volume which worked for me.

![](./media/disable-colume-shadow-copy.jpg)

# Next

I hope to upgrade the graphics card next. There's an old used computer store downtown where I live where I hope to get one. Also looking for some memory sticks for this thing, apparently it can hold up to 4GB, and it has 256mb currently. Both of those should really help out.
