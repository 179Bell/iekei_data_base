import { Button } from '@chakra-ui/react';

type props = {
  children: string;
};

export const SubmitButton = (props: props) => {
  const { children } = props;
  return <Button>{children}</Button>;
};
