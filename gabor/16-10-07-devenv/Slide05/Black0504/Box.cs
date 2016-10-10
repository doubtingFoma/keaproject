using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0504
{
    class Box
    {
        private decimal length;
        private decimal width;
        private decimal height;

        public void SetLength(decimal newLength)
        {
            this.length = newLength;
        }
        public void SetWidth(decimal newWidth)
        {
            this.width = newWidth;
        }
        public void SetHeight(decimal newHeight)
        {
            this.height = newHeight;
        }

        public decimal CalculateVolume()
        {
            return this.length * this.width * this.height;
        }
    }
}
