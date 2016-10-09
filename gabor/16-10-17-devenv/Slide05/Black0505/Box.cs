using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0504
{
    class Box
    {
        public decimal Length { get; set; }
        public decimal Width { get; set; }
        public decimal Height { get; set; }

        public decimal Volume
        {
            get
            {
                return this.Length * this.Width * this.Height;
            }
        }

        public decimal Surface
        {
            get
            {
                return this.Length * this.Width * 2 + this.Length * this.Height * 2 +  this.Width * this.Height * 2;
            }
        }
    }
}
