using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0705
{
    class Image : IAttachable
    {
        public int Size { get; set;} 
        public string Type { get; set; }

        public Image(int size, string type)
        {
            this.Size = size;
            this.Type = type;
        }
    }
}
