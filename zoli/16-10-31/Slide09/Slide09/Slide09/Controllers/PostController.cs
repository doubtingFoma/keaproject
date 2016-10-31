using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Slide09.Controllers
{
    public class PostController : Controller
    {
        public List<string> Posts { get; set; } = new List<string>();

        public PostController()
        {

        }   

        public void SessionHelper()
        {
            if (Session["Posts"] == null)
            {
                Posts.Add("Krumpli");
                Posts.Add("Kukucs");
                Posts.Add("Kifli");
                Session["Posts"] = this.Posts;
            }
            else
            {
                this.Posts = (List<string>)Session["Posts"];
            }
        }

        public ActionResult Details(int id)
        {
            SessionHelper();

            ViewBag.PostsContent = Posts[id];
            return View();
        }

        // GET: Posts
        public ActionResult Index()
        {
            SessionHelper();            
            return View();
        }

        [HttpGet]
        public ActionResult Create()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Create(string OnePost)
        {
            this.Posts = (List<string>)Session["Posts"];
            this.Posts.Add(OnePost);
            Session["Posts"] = this.Posts;
            return RedirectToAction("Index");
        }

        public ActionResult LayoutTest()
        {
            return View();
        }

    }
}