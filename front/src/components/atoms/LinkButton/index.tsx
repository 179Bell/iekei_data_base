import { Button } from '@chakra-ui/react';
// import  { useRouter } from "next/router";

type props = {
  size: string;
  textColor: string;
  mr?: string;
  variant?: string;
  _hover?: object;
  children: string;
  // href: string;
};

export const LinkButton = (props: props) => {
  // const router = useRouter();
  const { size, textColor, mr, variant, _hover, children } = props;

  return (
    <Button size={size} textColor={textColor} mr={mr} variant={variant} _hover={_hover}>
      {children}
    </Button>
  );
};
