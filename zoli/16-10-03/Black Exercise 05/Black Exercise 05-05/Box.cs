using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_05_05
{
    class Box
    {
        //this is a private float number that holds the actual width of the box
        private float width;

        //this is a property. It works a bit different in some situations than a field.
        //For now, it does the same, there is no different, but in the future, you may encounter some cases where properties are the only way to go.
        public float Width
        {
            get
            {
                //when we don't assign anyhting to the Width, it will return the box's width value
                return this.width;
            }
            //we write what to do when we add value to the Width property
            set
            {
                //width is going to be the value that we passed to this item (value is a reserved word for this purpose!)
                width = value;
            }
        }


        //this is the auto-implemented property, which is basically the simplified form of the function above
        //in this case, we don't need new variables to store the data in them
        //Note: this is just from C# 3.0!!!!
        public float Height { get; set; }
        public float Length { get; set; }


        //public function that calculates the volume and returns the value to whoever called it.
        //this is a read only property, because no set accessor is assigned to it.
        public float CalcVolume
        {
            get {
                return this.Height * this.Width * this.Length;                
            }

        }

        //this is also a read only property
        public float CalcSurface
        {
            get
            {
                return (2 * this.Height * this.Width) + (2 * this.Length * this.Width) + (2 * this.Height * this.Length);
                
            }

        }


    }
}
