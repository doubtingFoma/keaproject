using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_05_04
{
    class Program
    {
        static void Main(string[] args)
        {
            Box MyLittleBox = new Box();

            //calling each functions to set the dimensions of the box
            MyLittleBox.SetHeight(20f);
            MyLittleBox.SetLength(30f);
            MyLittleBox.SetWidth(40f);

            //calling the calcvolume function and write its return value to the console
            Console.WriteLine($"The volume of the box is {MyLittleBox.CalcVolume()}.");

            Console.ReadKey();
        }
    }
}
