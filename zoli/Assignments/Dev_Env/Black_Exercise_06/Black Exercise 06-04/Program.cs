using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_06_04
{
    class Program
    {
        static void Main(string[] args)
        {
            Car BMWX5 = new Car();
            Bicycle Gepida = new Bicycle();
            Vehicle RandomVehicle = new Vehicle();
            
            BMWX5.Indicate(false);
            Gepida.Indicate(true);

            Console.ReadKey();
        }

        class Vehicle
        {
            public int Speed;
            public int Accelerate;
            public int Decelerate;
            public virtual void Indicate(bool indication)
            {
                if (indication)
                {
                    Console.WriteLine("Turning left");
                }
                else
                {
                    Console.WriteLine("Turning right");
                }

            }
        }

        class Car : Vehicle
        {
            public void HonkHorn()
            {
                Console.WriteLine("Honk Honk");
            }

            public override void Indicate(bool indication)
            {
                //we execute the orignal Indicate function that the car inherited from the vehicle (the virtual one)
                base.Indicate(indication);
                if (indication)
                {
                    Console.WriteLine("Flashing left indicator");
                }
                else
                {
                    Console.WriteLine("Flashing right indicator");
                }
            }

        }

        class Bicycle : Vehicle
        {
            public void RingBell()
            {
                Console.WriteLine("Ring Ring");
            }

            public override void Indicate(bool indication)
            {
                // execute the original indicate method
                base.Indicate(indication);
                if (indication)
                {
                    Console.WriteLine("Raising left arm");
                }
                else
                {
                    Console.WriteLine("Raising right arm");
                }
            }

        }
    }
}
