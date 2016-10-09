using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0504
{
    class Box
    {
        private decimal Length { get; set; }
        private decimal Width { get; set; }
        private decimal Height { get; set; }

        // Constructor
        public Box(decimal length, decimal width, decimal height)
        {
            Console.WriteLine("A box object has been initialized.");
            this.Length = length;
            this.Width = width;
            this.Height = height;
        }

        public decimal Volume
        {
            get
            {
                return this.Length * this.Width * this.Height;
            }
        }

        private decimal Surface
        {
            get
            {
                return this.Length * this.Width * 2 + this.Length * this.Height * 2 + this.Width * this.Height * 2;
            }
        }
    }
}
