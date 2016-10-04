using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_05_04
{
    class Box
    {
        //this is a private variable. it cannot be accessed from anywhere else, just from this class
        //So you need a new method to give these a value from an external place
        private float Height;
        private float Width;
        private float Length;

        //this is a public function that can handle all those private variables
        public void SetHeight(float H)
        {
            this.Height = H;
        }

        public void SetWidth(float W)
        {
            this.Width = W;
        }

        public void SetLength(float L)
        {
            this.Length = L;
        }

        //public function that calculates the volume and returns the value to whoever called it
        public float CalcVolume()
        {
            return this.Height * this.Width * this.Length;

        }

    }
}
