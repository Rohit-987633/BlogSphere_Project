<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BlogSphere Services</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg,rgb(104, 46, 167) 0%, #2575fc 100%);
      color: #333;
    }

    /* Navigation Tabs */
    .filter-bar {
      display: flex;
      justify-content: center;
      background-color: #2f3542;
      padding: 15px 0;
    }

    .filter-bar button {
      background: none;
      border: none;
      color: white;
      margin: 0 20px;
      font-size: 16px;
      cursor: pointer;
      padding: 8px 15px;
      transition: 0.3s;
    }

    .filter-bar button.active,
    .filter-bar button:hover {
      background-color: #1e90ff;
      color: #fff;
      border-radius: 5px;
    }

    /* Grid Layout */
    .service-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 40px 20px;
      gap: 30px;
    }

    .service-card {
      width: 250px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: 0.3s ease;
      background: #fff;
      cursor: pointer;
    }

    .service-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 50% 50% 0 0;
    }

    .service-card .category {
      font-size: 12px;
      color: #e74c3c;
      margin: 10px;
      text-transform: uppercase;
    }

    .service-card .title {
      font-size: 16px;
      margin: 0 10px 15px;
      color: #333;
    }

    .hide {
      display: none;
    }

    /* Details Section */
    .details-section {
      display: none;
      padding: 30px;
      background: #fff;
      margin: 20px auto;
      max-width: 800px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .details-section img {
      float: left;
      width: 250px;
      height: 200px;
      object-fit: cover;
      margin-right: 20px;
      border-radius: 8px;
    }

    .details-section h2 {
      margin-top: 0;
    }

    .footer {
      background: #2f3542;
      color: #fff;
      padding: 20px;
      text-align: center;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <!-- Filter Menu (All Removed) -->
  <div class="filter-bar">
    <button class="active" onclick="filterSelection('inspiration')">Inspiration</button>
    <button onclick="filterSelection('howto')">How-To</button>
    <button onclick="filterSelection('giveaways')">Giveaways</button>
    <button onclick="filterSelection('learning')">Learning & Resources</button>
  </div>

  <!-- Services Grid -->
  <div class="service-grid" id="cardContainer">
    <!-- Cards will be added dynamically via JS -->
  </div>

  <!-- Details Section -->
  <div class="details-section" id="detailsSection">
    <img id="detailImg" src="" alt="Details Image">
    <div id="detailText">
      <h2 id="detailTitle">Service Title</h2>
      <p id="detailDesc">Full description will be shown here when the user clicks a thumbnail.</p>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    &copy; 2025 BlogSphere | Designed by Bhimsen & Team
  </div>

  <script>
    const data = [
      {
        category: 'inspiration',
        title: 'Curated Blog Showcases',
        image: 'https://images.unsplash.com/photo-1557683316-973673baf926',
        description:"Curated Blog Showcases are the heart of BlogSpheres inspiration section. Each month, our editorial team hand-picks exceptional blogs from various niches—technology, lifestyle, food, travel, gaming, and more—that exemplify innovation, aesthetics, and storytelling excellence. These are not just random picks; we carefully evaluate them based on factors such as unique content voice, user engagement, navigation flow, visual presentation, mobile responsiveness, and SEO effectiveness. Each showcased blog is presented with a detailed breakdown, including a brief overview, what makes it stand out, its challenges, and lessons readers can take away. By analyzing real-world examples, users learn how structure, content strategy, and branding work together to build a memorable blog. For beginners, it serves as a roadmap; for experienced creators, it sparks ideas for optimization. Additionally, users can interact with featured blogs—bookmark them, leave comments, or even ask questions to the creators. This not only brings visibility to bloggers but fosters a learning community. Our showcases rotate weekly and feature both professional creators and community submissions, allowing emerging bloggers the chance to be recognized. Whether you're just starting or revamping your blog, these showcases serve as a visual and strategic guide to success. They offer more than just admiration—they inspire action, helping users translate vision into reality."
      },
      {
        category: 'inspiration',
        title: 'Daily Design Prompts',
        image: 'https://images.unsplash.com/photo-1557683316-973673baf926',
        description: 'Creative consistency can be challenging, especially in the world of visual blogging. That’s where Daily Design Prompts come in. These bite-sized creative challenges are perfect for sharpening design thinking and helping creators stay visually active. Each day, BlogSphere publishes a new prompt—ranging from creating a blog banner, redesigning a homepage layout, to crafting a graphic for a quote or a fictional product. These prompts are tailored for a broad audience—from beginners using Canva to professionals working in Adobe Illustrator or Figma. Each prompt is accompanied by visual references, color palette suggestions, and design tips to help users get started. Users can also submit their interpretations to a community gallery where others can view, comment, and get inspired. For those wanting more structure, we offer weekly themes like “Minimal Mondays” or “Typography Thursdays,” adding variation and fun to the challenge. Participating regularly builds a habit of design, strengthens your portfolio, and combats creative block. It’s a fantastic way to warm up your creative muscles before starting a blog project or trying a new style. Sharing your work also improves visibility and boosts confidence, especially for those just beginning their design journey.Daily Design Prompts are not just tasks—they’re daily doses of motivation and an interactive way to grow your design skillset within a community of like-minded creators.'
      },
      {
        category: 'inspiration',
        title: 'UI/UX Gallery for Ideas',
        image: 'https://images.unsplash.com/photo-1557683316-973673baf926',
        description: 'The UI/UX Gallery for Ideas is a visual feast designed for bloggers, web designers, and digital creators looking to elevate their website layouts and user interfaces. This ever-growing collection showcases diverse examples from various industries such as fashion, technology, education, and entertainment. Whether you are looking to redesign your blog or just seeking inspiration, the gallery highlights both aesthetic and functional design elements that ensure a seamless and engaging user experience. In this gallery, we showcase top-tier user interface (UI) designs that include intuitive navigation, modern typography, color theory, and responsive layouts. Alongside UI, we dive deep into user experience (UX) elements such as easy accessibility, clear call-to-action buttons, and seamless interactions. Bloggers can explore these elements to help them craft a blog that not only looks visually appealing but also engages visitors from the moment they land on the page. The gallery categorizes designs into specific types—minimalist designs, interactive animations, mobile-first interfaces, or even advanced custom elements. Clicking on each design gives users a breakdown of why it works, offering key takeaways on improving their own layouts. The best part? Each UI/UX example is complemented by real-world data like user feedback, heatmaps, and performance metrics to show what truly drives engagement.For blog creators, this gallery is an essential resource to get ideas for crafting a professional blog that appeals to both the eyes and the mind. It empowers creators to think beyond basic templates, using industry best practices while still maintaining a unique personal touch.'
      },
      {
        category: 'inspiration',
        title: 'Content Trends & Storytelling Formats',
        image: 'https://images.unsplash.com/photo-1557683316-973673baf926',
        description: 'In the fast-paced digital world, content formats and storytelling styles evolve quickly, and staying on top of trends is crucial to maintaining audience engagement. The Content Trends & Storytelling Formats section on BlogSphere is dedicated to helping creators understand the latest content trends shaping the blogging industry. From microblogging and listicles to immersive storytelling and podcasts, we offer insights into what formats are driving the most engagement on social media and digital platforms. This section dives into the storytelling techniques that resonate with modern readers—whether through compelling narratives, data-driven posts, or emotional hooks. We break down the elements that make stories engaging, including the use of visuals, interactive content, humor, and even non-traditional blog formats like Instagram stories and TikTok-style content. BlogSphere also explores the growing influence of multimedia content. In an era where video and audio content dominate, we offer tutorials on incorporating podcasts, video blogs (vlogs), and visual storytelling into traditional text-based blogs. Additionally, we highlight how different platforms have specific content preferences—for example, long-form, SEO-optimized posts might work well on WordPress, while bite-sized visual content thrives on Instagram. For bloggers eager to stay ahead, this section is continuously updated with the latest insights on viral content and trends, ensuring that creators are always aware of the best formats to use for maximum impact. By adapting to these trends, bloggers can keep their content fresh, relevant, and engaging, attracting more readers while increasing social media visibility.'
      },
      {
        category: 'inspiration',
        title: 'Featured Creator Interviews',
        image: 'https://images.unsplash.com/photo-1557683316-973673baf926',
        description: 'The Featured Creator Interviews section is a goldmine of inspiration for anyone looking to dive deeper into the blogging world. This feature spotlights successful bloggers, content creators, and influencers across various industries, providing readers with firsthand insights into the journeys, struggles, and successes of some of the most innovative creators in the field. Each interview is carefully curated to provide value for all levels of bloggers. For beginners, it serves as a motivating introduction to the world of blogging, with advice on where to start, how to overcome early challenges, and tips for growing a blog from scratch. For intermediate and advanced creators, the interviews offer expert insights on content strategy, branding, SEO, monetization, and tools that have helped these top creators succeed. These interviews are not just about success stories—they also dive into the realities of blogging. Creators share their personal challenges, from dealing with burnout to tackling difficult topics, and how they maintain authenticity while building their online presence. By learning about the ups and downs of others paths, new bloggers can set realistic expectations for their own journey. Along with text-based interviews, we also include video and podcast formats for a more engaging experience. Each interview concludes with actionable tips that readers can implement right away—whether it is improving writing skills, optimizing for SEO, or better managing a content schedule. These interviews are a source of constant inspiration, offering new perspectives and strategies that can spark fresh ideas and drive ambition in your own blogging journey.'
      },
        {
        category: 'howto',
        title: 'How to Make an Album Cover in Adobe Illustrator',
        image: 'https://images.unsplash.com/photo-1608565472272-3c316d229d9a',
        description: 'Whether you’re brand-new to digital design or looking to refine your toolkit, our step-by-step tutorials guide you through the essentials of Photoshop, Illustrator, Figma, and more. Each tutorial begins with a clear overview of the interface and toolset—explaining what panels, brushes, and menus you’ll need. From there, you’ll embark on hands-on exercises: in Photoshop, you’ll learn how to remove backgrounds, apply adjustment layers, and export for web; in Illustrator, you’ll practice creating vector shapes, working with the Pen tool, and building scalable icons; in Figma, you’ll discover prototyping features, auto-layout for responsive design, and collaborative commenting. Every lesson is broken into bite-sized steps with annotated screenshots, so you always know exactly where to click and what settings to choose. Video snippets accompany tricky processes—like masking or color grading—so you can pause, rewind, and follow along at your own pace. By the end of each module, you’ll complete a mini-project (for example, designing a blog header or crafting a custom social-media graphic) that consolidates all the techniques you’ve learned. Alongside practical skills, we also share best practices—how to maintain consistent brand colors, optimize file sizes for fast page loads, and organize assets in folders or libraries. Built-in quizzes and downloadable exercise files help reinforce each concept. Whether you’re an illustrator polishing vector art, a blogger in need of eye-catching visuals, or a designer exploring new software, these tutorials demystify complex tools and build your confidence to create polished, professional graphics from scratch.'
      },
      {
        category: 'howto',
        title: 'How to do Blog Setup Guides',
        image: 'https://images.unsplash.com/photo-1603791440384-56cd371ee9a7',
        description: 'Launching a blog can feel daunting, but our platform-agnostic setup guides simplify the entire process—from choosing a domain name to publishing your first post. We start by helping you evaluate hosting options (shared vs. managed vs. serverless) and walk through registering a memorable domain. Next, we dive into three popular platforms—WordPress, Ghost, and Blogger—highlighting their strengths and ideal use cases. For each one, we provide a step-by-step walkthrough: installing the platform on your server or signing up for a hosted plan; configuring essential settings like permalinks, time zones, and user roles; selecting and installing a theme; and customizing homepages, menus, and widgets. Screenshots illustrate every click: where to find the “Add New Theme” button, how to upload via FTP, or how to toggle on search-engine visibility. We also include hands-on tips for securing your site—enabling SSL certificates, setting up backups via plugins or external services, and hardening login pages against brute-force attacks. Once the framework is in place, our guide shows you how to install key plugins or extensions for SEO, caching, and analytics. To help non-technical users, we explain common jargon—like “cron jobs,” “child themes,” or “webhooks”—in plain language. Finally, we walk you through creating and publishing your very first blog post, complete with media embedding and category assignment. By the time you finish, your blog will be live, secure, and ready to welcome readers—no coding degree required.'
      },
      {
        category: 'howto',
        title: 'How to do Branding & Logo Design',
        image: 'https://images.unsplash.com/photo-1608565472272-3c316d229d9a',
        description: 'A strong brand identity sets your blog apart and builds reader trust. Our Branding & Logo Design walkthroughs begin by defining your brand’s core values: tone (playful vs. professional), color personality (warm vs. cool), and typography style (serif vs. sans-serif). We guide you through mood-boarding exercises—collecting color swatches, inspirational logos, and font pairings—to clarify your aesthetic. In Illustrator or Figma, you’ll learn how to sketch rough logo ideas using simple shapes and the Pen tool, then refine them into vector graphics that scale cleanly on any device. We cover selecting a harmonious color palette using color-theory principles—complementary, analogous, and triadic schemes—and testing accessibility (contrast ratios) to ensure readability. Typography modules show you how to pair heading and body fonts, adjust kerning/leading, and embed web fonts for consistent display. As you experiment, we teach you to iterate quickly: exporting low-res mockups to test on actual blog templates, gathering feedback from peers, then tweaking line weights and curves. Alongside visual design, we delve into brand voice—crafting a tagline or mission statement that complements your logo. You’ll also learn how to create a style guide: specifying logo usage (minimum size, clearspace), color hex codes, font stacks, and tone-of-voice examples. By the end of the series, you’ll have a polished logo, a cohesive color palette, and clear brand guidelines to apply across headers, social media profiles, and print assets—empowering you to present a memorable, professional blog identity.'
      },
      {
        category: 'howto',
        title: 'How to do SEO Optimization for Blog Growth',
        image: 'https://images.unsplash.com/photo-1603791440384-56cd371ee9a7',
        description: 'Driving organic traffic is vital to any blog’s success, and our SEO Optimization tutorials cover everything you need to rank higher on search engines. We start with keyword research, showing you how to use free tools like Google Keyword Planner and AnswerThePublic to identify high-volume, low-competition phrases relevant to your niche. Next, we break down on-page SEO best practices: crafting compelling title tags and meta descriptions (including ideal character counts), structuring headings (H1–H3) with target keywords, and interlinking related posts for improved crawlability. You’ll learn to optimize images—compressing files, adding descriptive alt text, and building an image sitemap—so your visuals also drive traffic. Our tutorials guide you through creating and submitting an XML sitemap to Google Search Console, monitoring keyword rankings, and interpreting analytics reports to spot pages that need tweaks. We cover technical SEO essentials—improving site speed by enabling caching and minifying CSS/JS, implementing schema markup for rich snippets (recipes, reviews, FAQs), and ensuring mobile-friendliness with responsive design tests. Off-page strategies are also addressed: outreach techniques for acquiring quality backlinks, guest-posting guidelines, and social-sharing tactics to amplify your reach. Step-by-step videos walk you through setting up SEO plugins like Yoast or Rank Math, configuring robots.txt, and identifying crawl errors. Overarching themes include writing for humans first (avoiding keyword stuffing), maintaining a content calendar to keep posts fresh, and performing regular audits to preserve your rankings. Follow these tutorials, and you’ll build a blog that not only attracts visitors but keeps them engaged—laying the groundwork for sustainable growth.'
      },
      {
        category: 'howto',
        title: 'How to do Social Media Integration',
        image: 'https://images.unsplash.com/photo-1608565472272-3c316d229d9a',
        description: 'To extend your blog’s reach beyond its own pages, seamless social media integration is key. Our tutorials show you how to connect your site to platforms like Instagram, Twitter, Pinterest, and Facebook—automating sharing while maintaining control over formats and timing. We begin by adding share-buttons and social widgets: installing plugins or copying embed codes to display live tweets, Instagram galleries, or Facebook comment boxes within your posts. Next, we explore scheduling tools (Buffer, Hootsuite, Zapier) to automatically post new blog entries to your social channels, complete with custom images, hashtags, and post previews. You’ll learn how to craft platform-specific content—bit-sized quotes for Twitter, vertical graphics for Pinterest, carousel posts for Instagram—and how to track engagement metrics (clicks, likes, repins) to refine your strategy. Our integration tutorials also cover sitewide social login options, allowing readers to comment or subscribe using their existing social accounts, improving participation and reducing friction. We dive into Open Graph and Twitter Card metadata—configuring images, titles, and descriptions so that shared links always look professional and clickable. For advanced users, we demonstrate how to pull social feeds into your blog sidebar with APIs or RSS, creating a dynamic cross-platform experience. Finally, we discuss building a hashtag strategy, engaging with followers through polls or stories, and analyzing social analytics to understand peak posting times. By the end of these tutorials, you’ll have an automated, visually consistent, and data-driven social media workflow that drives traffic back to your blog—maximizing visibility with minimal ongoing effort.'
      }, 




{
  category: 'giveaways',
  title: 'Free Downloadable Resources',
  image: 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab',
  description: 'As a creative professional, it’s crucial to have access to high-quality design resources, but premium assets can quickly add up. Our Free Downloadable Resources section offers a treasure trove of free tools to enhance your blog without breaking the bank. Whether you’re a designer looking for UI kits to speed up your interface design or a blogger needing elegant icons to elevate your posts, we’ve got you covered. Our resources include an array of essential items—customized icon sets, UI kits, blog post templates, and website mockups. These downloadable assets are designed to save you time and money while maintaining a high standard of quality. Each resource comes with clear usage guidelines, ensuring they’re easy to integrate into your design workflow. For instance, our UI kits come with pre-designed components—buttons, forms, modals, and icons—ready for use in any project, saving you the hassle of starting from scratch. The icon sets include both vector and raster formats, making them versatile for all kinds of design needs, whether for blog navigation or social media sharing buttons. Additionally, we offer blog mockups that help visualize how your blog layout will look on different devices, saving hours of design work. All the resources are organized by category, so you can quickly find what fits your project needs. With regular updates and new freebies, you’ll never run out of fresh design assets to experiment with. So, whether you’re a beginner or a seasoned designer, these free resources will help you bring your creative vision to life—without a cost'
},
{
  category: 'giveaways',
  title: 'Monthly Subscription Giveaways',
  image: 'https://images.unsplash.com/photo-1603354350317-6ff0f1f982f6',
  description: 'Every month, we host exciting Monthly Subscription Giveaways that give you the chance to win some of the most essential tools in the creative industry. These tools—like Canva Pro and Adobe Creative Cloud—are game-changers for bloggers, designers, and content creators. Canva Pro offers advanced features like access to thousands of premium templates, stock photos, fonts, and the ability to collaborate with team members in real-time. With Adobe Creative Cloud, you gain access to the full suite of Adobe’s flagship creative tools, including Photoshop for photo editing, Illustrator for vector design, Premiere Pro for video editing, and InDesign for layout design. These are the tools that professionals swear by, and by participating in our monthly giveaways, you can win access to these powerful platforms at no cost. Simply enter the raffle, and you could be selected to receive a full subscription, providing you with the tools to take your content creation and design skills to the next level. Alongside industry-leading software, you’ll also get access to exclusive training materials and tutorials to help you get the most out of your subscriptions. Whether you need to refine your blog’s visuals, improve your branding, or design professional graphics for social media, these tools provide all the resources you need to enhance your projects. Our Monthly Subscription Giveaways make these creative resources more accessible to everyone, regardless of their budget. Stay tuned for our latest raffle announcements and get your chance to win!'
},
{
  category: 'giveaways',
  title: 'Template & Theme Packs',
  image: 'https://images.unsplash.com/photo-1583121274602-7f3d9a263228',
  description: 'Designing your blog can take hours—especially when you’re starting from scratch. Our Template & Theme Packs are designed to help you get started quickly, saving you valuable time. Whether you are using WordPress, Ghost, or Blogger, our high-quality templates and themes are fully customizable and ready to be integrated into your site. These packs include a range of professional layouts, from minimalist designs to more complex magazine-style templates. Whether you are building a personal blog, a portfolio, or a business site, these themes are adaptable for any niche. We’ve handpicked themes that are both visually stunning and functional, ensuring they include features like responsive design, optimized page loading speed, and easy navigation. You won’t need any coding skills to make these themes your own—just import them into your platform and tweak the colors, fonts, and images to fit your brand. Additionally, these themes come with pre-designed blog post layouts, homepage templates, and even custom widgets for contact forms, social media feeds, and more. To make things even easier, the template packs come with detailed instructions and video tutorials on how to install and customize them. This way, you can focus on what matters most: creating amazing content. With our Template & Theme Packs, youl will get a professionally designed blog without spending hours coding or hiring a developer. Plus, you can update your theme whenever you feel like a change—without the hassle of starting over.'
},
{
  category: 'giveaways',
  title: 'Hosting or Domain Giveaways',
  image: 'https://images.unsplash.com/photo-1498050108023-c5249f4df085',
  description: 'Starting a blog doesn’t have to be expensive, especially with our Hosting or Domain Giveaways. In collaboration with top-tier hosting providers, we offer you the chance to win free domain names and hosting plans—perfect for new bloggers or anyone looking to cut costs while building their online presence. A domain name is the foundation of your blog, and having a custom URL can make your site look more professional and credible. Our giveaways include domain names with .com, .net, or .org extensions, allowing you to pick a name that best reflects your brand and niche. Alongside domain names, we also offer hosting plans. Whether you need shared hosting for a personal blog or VPS hosting for a more robust site, our giveaways cover a variety of hosting needs. The included hosting plans come with benefits like unlimited bandwidth, 24/7 customer support, and SSL certificates for secure browsing. Additionally, we provide recommendations for integrating content management systems like WordPress with your hosting plan, ensuring a smooth and seamless experience. To enter our giveaway, all you need to do is participate in our monthly raffle—no purchase necessary. This giveaway is an excellent opportunity for anyone on a budget to establish a professional online presence and get started on their blogging journey without worrying about the upfront costs of hosting or domain registration.'
},
{
  category: 'giveaways',
  title: ' Fonts and Brush Kits',
  image: 'https://images.unsplash.com/photo-1526178610273-4a112d1f397f',
  description: 'To create a unique, eye-catching blog, every detail matters, and Fonts and Brush Kits play a significant role in shaping your brand’s personality. These premium design assets—usually reserved for paying customers—are now available to you for free. With access to high-quality fonts and brush kits, you can elevate your blog’s visuals and design elements. Fonts are essential for setting the tone of your content: whether you are going for a formal, professional look or a playful, informal vibe. Our collection includes modern, classic, and trendy font families that ensure your blog stands out. Pair clean, readable serif fonts with decorative display fonts for headlines or experiment with handwritten fonts to give your blog a personal touch. Alongside fonts, we offer brush kits—perfect for enhancing blog graphics, social media posts, and featured images. These brush kits come in various styles, from grunge to watercolor, that add texture and dimension to your designs. Whether you are creating a blog banner, a cover image for a social media post, or even an art piece for your portfolio, these brushes provide depth and personality. The best part is that all the fonts and brushes come in formats compatible with popular design software like Photoshop, Illustrator, and Procreate. With our Fonts and Brush Kits, you’ll have a rich library of tools to take your blog design to the next level—without spending a cent.'
},
{
  category: 'learning',
  title: 'Blogging for Business',
  image: 'https://images.unsplash.com/photo-1498050108023-c5249f4df085',
  description: 'Becoming a successful content creator requires continuous learning, and our Content Creation Courses cover everything you need to know, whether you are just starting or looking to refine your craft. For beginners, we offer foundational courses in blog writing, storytelling, and audience engagement, teaching you how to create posts that resonate with your readers. You will learn how to develop a content calendar, write compelling headlines, and optimize your posts for readability and SEO. As you progress, advanced courses are available to help you dive into video content creation, multimedia storytelling, and even podcasting. These more advanced courses will guide you on how to create engaging multimedia content that captures your audience’s attention. Whether you want to focus on blogging as a hobby or turn it into a full-fledged career, our courses offer comprehensive lessons on how to use different types of content—such as articles, videos, and podcasts—to grow your blog. Additionally, our content creation courses provide insights into best practices for content distribution, ensuring your work gets seen by the right people. By the end of the course, you will have a solid understanding of how to craft valuable content and strategically distribute it across platforms like social media, YouTube, and podcasting networks. Whether you are learning how to storyboard, script, or edit videos, our goal is to help you evolve into a well-rounded content creator. These courses are tailored for all skill levels, providing actionable tips, tools, and expert guidance to keep you improving.'
},
{
  category: 'learning',
  title: 'Newsletter Strategy Tips',
  image: 'https://images.unsplash.com/photo-1581093588401-ec4f9a888b18',
  description: 'Email marketing is still one of the most effective ways to build a loyal audience and drive traffic to your blog, and our Newsletter Strategy Tips will help you harness its power. In this section, you’ll learn how to create engaging, high-converting newsletters that keep your readers coming back for more. We cover everything from writing compelling subject lines to crafting personalized content that speaks directly to your subscribers. Whether you’re sending weekly blog roundups, special offers, or exclusive updates, we’ll guide you through the process of building a strong email list—the most valuable asset for any blogger. Learn about list segmentation, which allows you to send targeted messages based on your subscribers preferences and behaviors. We will also delve into email automation tools that allow you to schedule newsletters, set up welcome sequences, and run drip campaigns to nurture your audience. In addition, we discuss designing visually appealing newsletters, selecting the right call-to-action (CTA), and optimizing your newsletters for both desktop and mobile devices. By following our newsletter tips, you will not only drive more traffic to your blog but also foster stronger connections with your readers, keeping them engaged for the long term. Moreover, we will explore how to track and analyze newsletter performance, enabling you to continually improve your strategy. Our goal is to ensure your newsletters become a vital part of your content marketing strategy, driving conversions and growth.'
},
{
  category: 'learning',
  title: 'Monetization Guides',
  image: 'https://images.unsplash.com/photo-1581091012184-7a03ba6f13d4',
  description: 'Monetizing your blog is the ultimate goal for many bloggers, and our Monetization Guides provide a comprehensive roadmap to turn your passion into profit. We start with the basics, showing you how to set up Google AdSense to earn revenue from ad clicks on your blog. We’ll also cover affiliate marketing, teaching you how to strategically promote products or services that resonate with your audience, earning commissions with every sale made through your affiliate links. Learn how to work with brands, create sponsored content, and build partnerships that align with your blog’s mission and values. Beyond ads and affiliate marketing, our guides dive into alternative revenue streams like selling digital products (eBooks, courses, printables), offering services (consulting, coaching), and setting up membership programs for exclusive content. You’ll also get tips on setting up a shop or creating premium content that requires a paid subscription. As part of the monetization process, we’ll show you how to create a pricing strategy, structure deals with sponsors, and manage your blog finances to ensure your blog stays profitable long-term. Plus, we’ll highlight best practices for increasing your blog traffic, optimizing content for search engines, and driving conversions—all of which play a crucial role in maximizing revenue. Our Monetization Guides provide real-world, actionable steps to turn your blog into a thriving business.'
},
{
  category: 'learning',
  title: 'Writing Tools & Pluginsx',
  image: 'https://images.unsplash.com/photo-1573164713988-8665fc963095',
  description: 'Good writing is at the core of every successful blog, and Writing Tools & Plugins are the key to making your content clear, engaging, and error-free. In this section, you’ll discover essential tools to streamline your writing process, from grammar assistants like Grammarly and Hemingway Editor to tools that help you optimize your content for readability and SEO. These tools will help you avoid common grammatical mistakes, improve sentence structure, and ensure your writing flows smoothly. Additionally, we introduce writing plugins that integrate directly into your CMS, such as Yoast SEO for WordPress, which helps optimize content for search engines while keeping your writing user-friendly. For bloggers who want to save time editing, we also recommend a variety of browser extensions that provide real-time grammar and spelling checks while you write. These plugins also offer plagiarism detection to ensure your content is original. You’ll also learn about tools that help you generate blog ideas and plan your content more effectively. Our list includes apps that assist in brainstorming, drafting, and organizing your ideas, ensuring you stay productive and creative. Whether you’re a new writer or an experienced blogger, these writing tools and plugins will empower you to create high-quality, polished content with minimal effort.'
},

    ];

    const cardContainer = document.getElementById('cardContainer');
    const detailsSection = document.getElementById('detailsSection');
    const detailImg = document.getElementById('detailImg');
    const detailTitle = document.getElementById('detailTitle');
    const detailDesc = document.getElementById('detailDesc');

    function renderCards(category = 'none') {
  cardContainer.innerHTML = '';
  const filtered = data.filter(item => item.category === category);
  
  if (filtered.length > 0) {
    // Create a category title header
    const categoryHeader = document.createElement('h2');
    categoryHeader.textContent = capitalize(category) + ' Services';
    categoryHeader.style.textAlign = 'center';
    categoryHeader.style.width = '100%';
    categoryHeader.style.color = '#2f3542';
    categoryHeader.style.marginTop = '20px';
    cardContainer.appendChild(categoryHeader);
  }

  filtered.forEach(item => {
    const card = document.createElement('div');
    card.className = 'service-card';
    card.onclick = () => showDetails(item);
    card.innerHTML = `
      <img src="${item.image}" alt="${item.title}">
      <p class="category">${capitalize(item.category)}</p>
      <p class="title">${item.title}</p>
    `;
    cardContainer.appendChild(card);
  });
}

    

    function showDetails(item) {
      detailImg.src = item.image;
      detailTitle.innerText = item.title;
      detailDesc.innerText = item.description;
      detailsSection.style.display = 'block';
      window.scrollTo({ top: detailsSection.offsetTop - 50, behavior: 'smooth' });
    }

    function filterSelection(cat) {
      document.querySelectorAll('.filter-bar button').forEach(btn => btn.classList.remove('active'));
      event.target.classList.add('active');
      renderCards(cat);
      detailsSection.style.display = 'none';
    }

    function capitalize(str) {
      return str.charAt(0).toUpperCase() + str.slice(1);
    }

    // Initial render with "inspiration"
    renderCards('inspiration');
  </script>
</body>
</html>
