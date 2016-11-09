using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;

namespace Slide09.Models
{
    public class Post
    {
        public Guid PostId { get; }

        [Required]
        [StringLength(100, MinimumLength = 5, ErrorMessage = "Please more than 5, less than 100 characters :)")]
        public string Title { get; set; }

        [Required]
        public string Content { get; set; }

        public Post()
        {
            PostId = Guid.NewGuid();
        }

    }
}