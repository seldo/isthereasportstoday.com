Shit that I Already Know Needs To Get Done:

1. This needs a real api, vs. parsing a stale ics file. I am presuming that any api key, if necessary, should *not* be stored directly in git.
2. This needs to be asynchronous. I've already implemented this on FYOakland, but not here yet; FYO regenerates index.html once an hour.
3. It's got multiple templates, but still needs the rand.range bit to use them; it's still hard-coded to $template.1.html.
4. I would be super-into rewriting this in python.
5. The css should be broken out, but I don't quite recall how much the css differs between the different templates.
