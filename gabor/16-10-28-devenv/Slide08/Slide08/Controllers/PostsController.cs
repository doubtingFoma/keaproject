using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Slide08.Controllers
{
    public class PostsController : Controller
    {
        public List<string> Posts { get; set; }

        public PostsController()
        {
            this.Posts = new List<string>();
            this.Posts.Add("posts 1");
            this.Posts.Add("posts 2");
            this.Posts.Add("posts 3");
        }

        public ActionResult Index()
        {
            return Content("Hello from PostsController Index()");
        }

        // GET: Posts
        // Test it on -http://localhost:52783/posts/details/1
        public ActionResult Details(int id)
        {
            return Content(this.Posts[id-1]);
        }

    }
}