using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using Slide09.Models; // importing the models from the project

namespace Slide09.Controllers
{
    public class PostController : Controller
    {        
        public List<Post> Posts { get; set; }

        public PostController()
        {
            this.Posts = new List<Post>();
        }   

        public void SessionHelper()
        {
            if (Session["Posts"] == null)
            {
                Posts.Add(new Post { Title = "Krumpli", Content = "This is a krumpli." });
                Posts.Add(new Post { Title = "Kukucs", Content = "This is a Kukucs." });
                Posts.Add(new Post { Title = "Kifli", Content = "This is a Kifli." });
                Session["Posts"] = this.Posts;
            }
            else
            {
                this.Posts = (List<Post>)Session["Posts"];
            }
        }

        public ActionResult Details(int id)
        {
            SessionHelper();
            //ViewBag.PostsContent = ($"Content: {Posts[id].Content}  ID: {Posts[id].PostId}");
            return View(Posts[id]);            
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
        public ActionResult Create(Post post)
        {
            if (ModelState.IsValid)
            {
                this.Posts = (List<Post>)Session["Posts"];

                this.Posts.Add(post);

                Session["Posts"] = this.Posts;

                return RedirectToAction("Index");
            }
            else
            {
                return View();
            }



        }

        public ActionResult LayoutTest()
        {
            return View();
        }

    }
}